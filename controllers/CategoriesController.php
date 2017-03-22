<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Category;
use yii\filters\AccessControl;
use Yii;

class CategoriesController extends \yii\web\Controller
{
  public function actionIndex()
  {
    $q = Category::find();
    $pagination = new Pagination([
      'defaultPageSize' => 20,
      'totalCount' => $q->count()
    ]);

    $categories = $q->orderBy('name')->offset($pagination->offset)->limit($pagination->limit)->all();

    return $this->render('index', ['categories' => $categories, 'pagination' => $pagination]);
  }

  public function actionCreate()
  {
      $category = new Category();

      if ($category->load(Yii::$app->request->post())) {
          if ($category->validate()) {
              $category->save();

              /* Flash message */
              Yii::$app->getSession()->setFlash('success', 'Category added successfully!');
              return $this->redirect('/categories');
          }
      }

      return $this->render('create', [
          'category' => $category,
      ]);
  }


  /* Restriction */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['create'],
        'rules' => [
          [
            'actions' => ['create'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ], 
      ]
    ];
  }

}
