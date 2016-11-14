<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveyListScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Survey Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Survey List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cid',
            'hcode',
            'survey_staff_id',
            'create_by',
            // 'create_date',
            // 's_d1',
            // 's_d2',
            // 's_d3',
            // 's_d4',
            // 's_d5',
            // 's_d6',
            // 's_d7',
            // 's_d8',
            // 's_d9',
            // 's_d10',
            // 's_sum',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
