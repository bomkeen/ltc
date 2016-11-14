<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'แก้ไขข้อมูลของ: ' . $model->pname .' '.$model->fname .' '.$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pname .' '.$model->fname .' '.$model->lname, 'url' => ['view', 'id' => $model->cid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-update">
    <div class="page-header">
    <h2><?= Html::encode($this->title) ?></h2>
    </div>  
    <?= $this->render('_form', [
        'model' => $model,
        'amppart'=>$amppart,
                'tmbpart'=>$tmbpart
    ]) ?>

</div>
