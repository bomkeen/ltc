<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyListScarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'hcode') ?>

    <?= $form->field($model, 'survey_staff_id') ?>

    <?= $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 's_d1') ?>

    <?php // echo $form->field($model, 's_d2') ?>

    <?php // echo $form->field($model, 's_d3') ?>

    <?php // echo $form->field($model, 's_d4') ?>

    <?php // echo $form->field($model, 's_d5') ?>

    <?php // echo $form->field($model, 's_d6') ?>

    <?php // echo $form->field($model, 's_d7') ?>

    <?php // echo $form->field($model, 's_d8') ?>

    <?php // echo $form->field($model, 's_d9') ?>

    <?php // echo $form->field($model, 's_d10') ?>

    <?php // echo $form->field($model, 's_sum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
