<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use dektrium\user\models\Profile;

$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'คัดกรองความสามารถในการด(นินชีวิตประจำวัน (Barthel ADL index)  ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">
    <div class="page-header">
           <h3><?= Html::encode($this->title) ?></h3>
           <h3><?php echo $model->hospcode_name ; ?></h3>
     
    </div>
    <div class="container-fluid">
    <div class="row">
         
        <div class="col-md-2 col-md-offset-9">
             <?php
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'exportConfig' => [
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_CSV => false,
            ExportMenu::FORMAT_EXCEL => false,
        ],
        'filename' => $this->title,
    ]);
    ?>
    </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row">
            <div class="col-md-12">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'hcode',
            //'hname',
            'cid',
            'pname',
            'fname',
            'lname',
            'sex',
            'moo',
            // 'tmbpart',
            'tambon',
            // 'amppart',
            'ampart',
            // 'chwpart',
            'province',
            [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['survey/update','id'=>$data['cid']],['class' => 'btn btn-success glyphicon glyphicon-plus']);
}],
            [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['survey/list','id'=>$data['cid']],['class' => 'btn btn-warning glyphicon glyphicon-th-list']);
}],

        ],
    ]);
    ?>
        </div></div>
    </div>
</div>
    
