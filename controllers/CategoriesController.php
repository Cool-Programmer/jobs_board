<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Category;

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
        return $this->render('create');
    }
}
