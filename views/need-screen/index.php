<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use dektrium\user\models\Profile;
include_once '../inc/thaidate.php';

$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ประเมินความต้องการได้รับการดูแลของผู้สูงอายุ';

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="person-index">
    <div class="page-header">
        <h3><font color=""><?= Html::encode($this->title) ?></font></h3>
        
     <h3><font color=""><?php echo $model->hospcode_name;?></font></h3>
     <p><font color="red">***ผู้สูงอายุที่ผ่านการประเมิน ADL อยู่ในกลุ่ม 2,3 </font></p>
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
                'label'=>'วันที่ประเมิน',
                'format' => 'raw',
                 'hAlign'=>'center',
                 'value'=>function ($data) {
                     return thaidate($data['ass_date']);         
        
                 }
                
            ],
                                  [
            'attribute'=>'ass_score',
            'label'=>'คะแนน',
            'hAlign'=>'center'
        ],
                       [
            'attribute'=>'AdlassaliasName',
            'label'=>'ผลการประเมิน ADL',
            //'hAlign'=>'center'
        ],
                                       [
            'attribute'=>'NhsogroupaliasName',
            'label'=>'ผลการประเมินภาวะพิ่งพิง',
            //'hAlign'=>'center'
        ],
         
           
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
            return Html::a('',['need-screen/page1','id'=>$data['cid']],['class' => 'btn btn-success glyphicon glyphicon-plus']);
}],
            [
            'label'=>'',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['need-screen/list','id'=>$data['cid']],['class' => 'btn btn-warning glyphicon glyphicon-th-list']);
}],

        ],
    ]);
    ?>
        </div></div>
    </div>
</div>
    
