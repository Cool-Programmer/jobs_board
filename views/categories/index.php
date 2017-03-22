<?php

/* @var $this yii\web\View */

  use yii\helpers\Html;
  use yii\widgets\LinkPager;

  $this->title = 'JobBase | Categories';
  $this->params['breadcrumbs'][] = 'Categories';
?>

<h2 class="page-header">All Job Categories <a href="/categories/create" class="btn btn-primary pull-right">Create</a></h2>

<ul class="list-group">
  <?php foreach($categories as $category): ?>
    <li class="list-group-item">
      <span class="badge"><?= count($category->job) ?></span>
      <a href="/jobs/index/<?=$category->id?>"><?= $category->name ?></a>
    </li>
  <?php endforeach ?>
</ul>

<?php LinkPager::widget(['pagination' => $pagination]) ?>