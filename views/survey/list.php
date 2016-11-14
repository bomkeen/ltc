<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\LAdlGroup;
include_once '../inc/thaidate.php';
$this->title = 'ผลการคัดกรอง ของ'.$person->pname." ".$person->fname." ".$person->lname;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-list-index">
    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <?= Html::a(' กลับหน้ารายชื่อคัดกรอง ADL', ['survey/index'], ['class' => 'btn btn-warning glyphicon glyphicon-triangle-left']) ?>
        </div>
    </div>
 
    <?php 

    ?>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'label'=>'วันที่คัดกรอง',
            'format' => 'raw',
            'value'=>function ($data) {
            return thaidate($data['create_date']);
}],
            's_sum',
       
    'AdlgroupaliasName',
           [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['survey/edit','id'=>$data['id'],'cid'=>$data['cid']],['class' => 'btn btn-danger glyphicon glyphicon-pencil']);
}],
        ],
    ]); ?>
</div>
