<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaregiverScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caregivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caregiver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pname',
            'fname',
            'lname',
            'cid',
            // 'sex',
            // 'birth_date',
            // 'create_by',
            // 'hcode',
            // 'education',
            // 'train_name',
            // 'train_name_other',
            // 'train_dep',
            // 'train_date',
            // 'exp',
            // 'moo',
            // 'tmbpart',
            // 'tmbpart_name',
            // 'amppart',
            // 'amppart_name',
            // 'chwpart',
            // 'chwpart_name',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
