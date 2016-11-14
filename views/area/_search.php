<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AreaScarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hcode_create') ?>

    <?= $form->field($model, 'user_id_create') ?>

    <?= $form->field($model, 'addressid') ?>

    <?= $form->field($model, 'moo') ?>

    <?php // echo $form->field($model, 'moo_name') ?>

    <?php // echo $form->field($model, 'tmbpart') ?>

    <?php // echo $form->field($model, 'tmbpart_name') ?>

    <?php // echo $form->field($model, 'amppart') ?>

    <?php // echo $form->field($model, 'amppart_name') ?>

    <?php // echo $form->field($model, 'chwpart') ?>

    <?php // echo $form->field($model, 'chwpart_name') ?>

    <?php // echo $form->field($model, 'hcode_service') ?>

    <?php // echo $form->field($model, 'hcode_service_name') ?>

    <?php // echo $form->field($model, 'opt_code') ?>

    <?php // echo $form->field($model, 'opt_code_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
