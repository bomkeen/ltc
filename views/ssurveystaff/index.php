<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use dektrium\user\models\Profile;

$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ข้อมูลผู้สำรวจ ของ '.$model->hospcode_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssurveystaff-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มรายการ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
