<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\LAdlGroup;
include_once '../inc/thaidate.php';
$this->title = 'การประเมินความต้องการ ของ'.$person->pname." ".$person->fname." ".$person->lname;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-list-index">
    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="row">
        <div class="col-md-3">
         <?= Html::a(' เพิ่มรายการ', ['page1','id'=>$person->cid], ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>    
        </div>
        <div class="col-md-3 col-md-offset-6">
            <?= Html::a(' กลับหน้ารายชื่อประเมิน', ['index'], ['class' => 'btn btn-warning glyphicon glyphicon-triangle-left']) ?>
        </div>
    </div>
    <br>
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
            return thaidate($data['need_screen_date']);
}],
       'oapp_p',
               [
            'label'=>'วันที่นัดหมาย',
            'format' => 'raw',
            'value'=>function ($data) {
            return thaidate($data['oapp_date']);
}],
           [
            'label'=>'แก้ไข',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['update','id'=>$data['id'],'cid'=>$data['cid']],['class' => 'btn btn-info glyphicon glyphicon-pencil']);
}],
              [
            'label'=>'แสดงข้อมูลสำรวจ',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['view','id'=>$data['id'],'cid'=>$data['cid']],['class' => 'btn btn-primary glyphicon glyphicon-eye-open']);
}],
               [
            'label'=>'ลบข้อมูล',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['delete','id'=>$data['id'],'cid'=>$data['cid']],['class' => 'btn btn-danger glyphicon glyphicon-erase'
                ,  'data' => [
                'confirm' => "คุณต้องการลบข้อมูลการประเมินใช่หรือไม่",
                'method' => 'post',
            ]
                ]);
}],
        ],
    ]); ?>
</div>
