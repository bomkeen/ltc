<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = 'แก้ไขข้อมูล Caregiver ของ :: ' . $model->pname." ".$model->fname." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Caregivers', 'url' => ['create']];
//$this->params['breadcrumbs'][] = ['label' => $model->pname." ".$model->fname." ".$model->lname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caregiver-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,'profile'=>$profile,'amppart'=>$amppart,'tmbpart'=>$tmbpart
    ]) ?>

</div>
