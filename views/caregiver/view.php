<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = 'แก้ไขข้อมูล Caregiver ของ :: ' . $model->pname." ".$model->fname." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Caregivers', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'pname',
            'fname',
            'lname',
            'cid',
            'sex',
            'birth_date',
            //'create_by',
            //'hcode',
            'education',
            'train_name',
            'train_name_other',
            'train_dep',
            'train_date',
            'exp',
            'moo',
            //'tmbpart',
            'tmbpart_name',
            //'amppart',
            'amppart_name',
           // 'chwpart',
            'chwpart_name',
            'status',
        ],
    ]) ?>

</div>
