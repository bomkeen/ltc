<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dektrium\user\models\Profile;

$title = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ข้อมูล ผู้จัดการระบบดูแลระยะยาวด้านสาธารณสุข
(Care Manager)';
//$this->params['breadcrumbs'][] = ['label' => 'Caremanagers', 'url' => ['create']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caremanager-create">
    <div class="page-header">
    <h3><?= Html::encode($this->title) ?><br>
    <?php        echo "ของ".$title->hospcode_name ;?>
    </h3>
</div>
    <div class="well">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
<div class="row">
    
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pname',
            'fname',
            'lname',
            [ // แสดงข้อมูลออกเป็นสีตามเงื่อนไข
          'attribute' => 'status',
          'format'=>'html',
                 'hAlign'=>'center',
          'value'=>function($model, $key, $index, $column){
            return $model->status=='Y' ? "<span style=\"color:green;\">ปฎิบัติงาน</span>":"<span style=\"color:red;\">ไม่ปฎิบัติงาน</span>";
          }
        ],
         [
  'class' => 'yii\grid\ActionColumn',
  'buttonOptions'=>['class'=>'btn btn-default'],
  'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} </div>'
],
        ],
    ]); ?>
</div>