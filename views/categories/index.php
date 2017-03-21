<?php

/* @var $this yii\web\View */

  use yii\helpers\Html;
  use yii\widgets\LinkPager;

  $this->title = 'JobBase | Categories';
  $this->params['breadcrumbs'][] = 'Categories';
?>

<h2 class="page-header">All Job Categories</h2>

<ul class="list-group">
  <?php foreach($categories as $category): ?>
    <li class="list-group-item">
      <?= $category->name ?>
    </li>
  <?php endforeach ?>
</ul>