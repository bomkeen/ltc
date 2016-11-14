<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaregiverScarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caregiver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pname') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'hcode') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'train_name') ?>

    <?php // echo $form->field($model, 'train_name_other') ?>

    <?php // echo $form->field($model, 'train_dep') ?>

    <?php // echo $form->field($model, 'train_date') ?>

    <?php // echo $form->field($model, 'exp') ?>

    <?php // echo $form->field($model, 'moo') ?>

    <?php // echo $form->field($model, 'tmbpart') ?>

    <?php // echo $form->field($model, 'tmbpart_name') ?>

    <?php // echo $form->field($model, 'amppart') ?>

    <?php // echo $form->field($model, 'amppart_name') ?>

    <?php // echo $form->field($model, 'chwpart') ?>

    <?php // echo $form->field($model, 'chwpart_name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
