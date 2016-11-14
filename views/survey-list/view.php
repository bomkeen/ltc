<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Survey Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'cid',
            'hcode',
            'survey_staff_id',
            'create_by',
            'create_date',
            's_d1',
            's_d2',
            's_d3',
            's_d4',
            's_d5',
            's_d6',
            's_d7',
            's_d8',
            's_d9',
            's_d10',
            's_sum',
        ],
    ]) ?>

</div>
