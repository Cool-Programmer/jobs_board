<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Type;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
?>

<h2 class="page-header">Add new job listing</h2>
<div class="jobs-create">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($job); ?>
        <?= $form->field($job, 'category_id')->dropDownList(Category::find()->orderBy('name')->select(['name', 'id']) -> indexBy('id') -> column(), ['prompt' => ' Select a Category']) ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textarea(['rows'=>6]) ?>
        <?= $form->field($job, 'type')->dropDownList(Type::find()->orderBy('name')->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => 'Select a Type']) ?>
        <?= $form->field($job, 'requirements') ?>
        <?= $form->field($job, 'salary_range')->dropDownList([
            'under_20_k' => 'Under $20 k',
            '20k-40k' => '$20k - $40k',
            '40k-60k' => '$40k - $60k',
            '60k-70k' => '$60k - $80k',
            '70k-90k' => '$90k - $100k',
            '100k-120k' => '$100k - $120k',
            '120k-140k' => '$120k - $140k',
            '140k-160k' => '$140k - $160k',
            '160k-180k' => '$160k - $180k',
            'over_200k' => 'Over $200k ' 
        ], ["prompt" => "Select annual salary range"])?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'state') ?>
        <?= $form->field($job, 'zipcode') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')->checkbox() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- jobs-create -->