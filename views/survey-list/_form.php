<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_staff_id')->textInput() ?>

    <?= $form->field($model, 'create_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 's_d1')->textInput() ?>

    <?= $form->field($model, 's_d2')->textInput() ?>

    <?= $form->field($model, 's_d3')->textInput() ?>

    <?= $form->field($model, 's_d4')->textInput() ?>

    <?= $form->field($model, 's_d5')->textInput() ?>

    <?= $form->field($model, 's_d6')->textInput() ?>

    <?= $form->field($model, 's_d7')->textInput() ?>

    <?= $form->field($model, 's_d8')->textInput() ?>

    <?= $form->field($model, 's_d9')->textInput() ?>

    <?= $form->field($model, 's_d10')->textInput() ?>

    <?= $form->field($model, 's_sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
