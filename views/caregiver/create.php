<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dektrium\user\models\Profile;
/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */
$title = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
$this->title = 'ข้อมูลผู้ช่วยเหลือดูแลผู้สูงอายุที่มีภาวะพึ่งพิง (Caregiver)';
//$this->params['breadcrumbs'][] = ['label' => 'Caregivers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-create">
    <div class="row">
        <div class="page-header">
            <h3><?= Html::encode($this->title) ?><br>
    <?php        echo "ของ".$title->hospcode_name ;?>
    </h3>
 </div></div>
    <div class="well">
    <?= $this->render('_form', [
        'model' => $model,'profile'=>$profile,
         'amppart'=>[],
         'tmbpart'=>[]
    ]) ?>
    </div>   
    <div class="row">
        <div class="container-fluid">
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
  'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {delete} {update} </div>'
],
        ],
    ]); ?>
        </div>
    </div>
</div>
