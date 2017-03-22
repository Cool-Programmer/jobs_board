<?php

namespace app\controllers;
use Yii;
use app\models\User;

class UsersController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
{
    $user = new User();

    if ($user->load(Yii::$app->request->post())) {
        if ($user->validate()) {
            $user->save();
            Yii::$app->getSession()->setFlash('success', 'You are now signed up and can login!');
            return $this->redirect('/site/login');
        }
    }

    return $this->render('register', [
        'user' => $user,
    ]);
}

}
