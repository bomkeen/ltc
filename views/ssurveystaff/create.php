<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dektrium\user\models\Profile;



/* @var $this yii\web\View */
/* @var $model app\models\Ssurveystaff */
$title = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ข้อมูลผู้สำรวจ ของ '.$title->hospcode_name;
//$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้สำรวจ', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssurveystaff-create">

    <h3><?= Html::encode($this->title) ?></h3>
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
                  // 'sex',
            // 'staff_type_id',
            // 'birth_date',
            // 'create_by',
            // 'hcode',
[
  'class' => 'yii\grid\ActionColumn',
  'buttonOptions'=>['class'=>'btn btn-default'],
  'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} </div>'
],
        ],
    ]); ?>
</div>
