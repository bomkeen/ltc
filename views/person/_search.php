<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hcode') ?>

    <?= $form->field($model, 'hname') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'pname') ?>

    <?= $form->field($model, 'fname') ?>

    <?php // echo $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'age_now') ?>

    <?php // echo $form->field($model, 'ptype') ?>

    <?php // echo $form->field($model, 'ptname') ?>

    <?php // echo $form->field($model, 'hmain') ?>

    <?php // echo $form->field($model, 'hsub') ?>

    <?php // echo $form->field($model, 'addressid') ?>

    <?php // echo $form->field($model, 'house_num') ?>

    <?php // echo $form->field($model, 'moo') ?>

    <?php // echo $form->field($model, 'tmbpart') ?>

    <?php // echo $form->field($model, 'tambon') ?>

    <?php // echo $form->field($model, 'amppart') ?>

    <?php // echo $form->field($model, 'ampart') ?>

    <?php // echo $form->field($model, 'chwpart') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'chronic') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'fstatus') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'discharge') ?>

    <?php // echo $form->field($model, 'ddischarge') ?>

    <?php // echo $form->field($model, 'update_status') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
