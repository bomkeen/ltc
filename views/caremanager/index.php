<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use dektrium\user\models\Profile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CaremanagerScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
//$this->title = 'Caremanagers';
$this->title = 'ข้อมูล Caremanager ของ '.$model->hospcode_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caremanager-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข้อมูล Caremanager', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    
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
            return $model->status=='Y' ? "<span style=\"color:green;\">เปิดการใช้งาน</span>":"<span style=\"color:red;\">ปิดการใช้งาน</span>";
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
