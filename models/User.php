<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\Security;

class User extends ActiveRecord implements IdentityInterface
{

    public $password_repeat;

    public function rules()
    {
        return [
            [['full_name', 'username', 'email', 'password', 'password_repeat'], 'required'],
            ['email', 'email'],
            /* Compare passwords */
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public static function tableName()
    {
        return '{{%tbl_user}}';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /* For Login functionality */
    public function validatePassword($password)
    {
        return $this->password === hash('ripemd160', $password);
    }

    public function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    /* Relationship with User model */
    public function getJob()
    {
        return $this->hasMany(Job::className(), ['user_id' => 'id']);
    }


    /* Catch and change before saving into db */
    public function beforeSave($insert)
    {
        $this->password = hash('ripemd160', $this->password);
        if ($this->isNewRecord) {
            $this->auth_key = \Yii::$app->security->generateRandomString();
        }
        return parent::beforeSave($insert);
    }

}