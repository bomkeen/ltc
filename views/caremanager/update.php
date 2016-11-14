<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caremanager */

$this->title = 'ปรับปรุงข้อมูล : ' . $model->pname." ".$model->fname." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Caremanagers', 'url' => ['create']];
//$this->params['breadcrumbs'][] = ['label' => $model->pname." ".$model->fname." ".$model->lname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caremanager-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
