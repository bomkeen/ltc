<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use dektrium\user\models\Profile;
include_once '../inc/thaidate.php';

$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ประเมินหาผู้สูงอายุที่มีภาวะพึ่งพิง '.$model->hospcode_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">
    <div class="page-header">
        <h3><font color="#3F51B5"><?= Html::encode($this->title) ?></font></h3>
     
    </div>
    <div class="container-fluid">
  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row">
            <div class="col-md-12">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive'=>FALSE,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cid',
            'pname',
            'fname',
            'lname',
            [
                'label'=>'วันที่คัดกรอง',
                'format' => 'raw',
                 'hAlign'=>'center',
                 'value'=>function ($data) {
                     return thaidate($data['survey_date']);         
        
                 }
                
            ],
                                  [
            'attribute'=>'survey_score',
            'label'=>'คะแนน',
            'hAlign'=>'center'
        ],
                       [
            'attribute'=>'AdlgroupaliasName',
            'label'=>'ผลคัดกรอง',
            //'hAlign'=>'center'
        ],
            //'sex',
           
           [
            'attribute'=>'house_num',
            'label'=>'บ้านเลขที่',
            'hAlign'=>'center'
        ],
            
            'moo',
             'tambon',
            //'province',
            [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['ass-list/create','id'=>$data['cid']],['class' => 'btn btn-success glyphicon glyphicon-plus']);
}],
            [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['ass-list/list','id'=>$data['cid']],['class' => 'btn btn-warning glyphicon glyphicon-th-list']);
}],

        ],
    ]);
    ?>
        </div></div>
    </div>
</div>
    
