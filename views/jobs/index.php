<?php
/* @var $this yii\web\View */
  use yii\helpers\Html;
  use yii\widgets\LinkPager;

  $this->title = 'JobBase | Jobs';
  $this->params['breadcrumbs'][] = 'Jobs';

?>

<?php if(!isset($_GET['id'])): ?>
<h1 class="page-header">All Open Jobs <a href="/jobs/create" class="btn btn-primary pull-right">Add a Listing</a> </h1>
<?php if(!empty($jobs)) : ?>
<ul class="list-group">
  <?php foreach($jobs as $job): ?>
    <li class="list-group-item">
      <?php
        $date = strtotime($job->create_date);
        $formatted_date = date("F j, Y, g:i a", $date);
      ?>
      <a href="/jobs/detail/<?=$job->id?>"><?= $job->title ?></a> - <strong><?= $job->state;?>, <?= $job->city ?></strong> - <span class="text-muted"><?= $formatted_date; ?></span>  
    </li>
  <?php endforeach ?>
</ul>
<?php LinkPager::widget(['pagination' => $pagination]); ?>
<?php else : ?>
  <p>There are currently no open jobs</p>
<?php endif ?>

<?php elseif(isset($_GET['id'])) : ?>
<?php if(!empty($jobs)) : ?>
  <ul class="list-group">
  <?php foreach($jobs as $job): ?>
    <li class="list-group-item">
      <?php
        $date = strtotime($job->create_date);
        $formatted_date = date("F j, Y, g:i a", $date);
      ?>
      <a href="/jobs/detail/<?=$job->id?>"><?= $job->title ?></a> - <strong><?= $job->state;?>, <?= $job->city ?></strong> - <span class="text-muted"><?= $formatted_date; ?></span>  
    </li>
  <?php endforeach ?>
</ul>
<?php else : ?>
  <p>There are currently no job listings in this category</p>
<?php endif ?>
<?php endif ?>