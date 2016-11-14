<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\jui\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

use dektrium\user\models\Profile;
use app\models\Dfeeding;
use app\models\Dgrooming;
use app\models\Dtransfer;
use app\models\Dtoilet;
use app\models\Dmobility;
use app\models\Ddressing;
use app\models\Dstairs;
use app\models\Dbathing;
use app\models\Dbowels;
use app\models\Dbladder;
use kartik\dialog\Dialog;
 
// widget with default options
echo Dialog::widget([
     
]);
 $user = Profile::find()->where(['user_id' => \Yii::$app->user->identity->getId()])->one();

?>

<div class="ssurveystaff-form">
    <div class="container-fluid">
    <?php $form = ActiveForm::begin([
              'id'           => 'demo'    ]); ?>
        <div class="panel panel-danger">
            <div class="panel-body">
                 <?= $form->field($model, 'create_date')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                        //'defaultDate' => $jui_y.'-01-01'
                        //'defaultDate' => '2014-01-01'
                    ],
                    'options' => ['class' => 'form-control']
                ]) ?>
                 <?=
                    $form->field($model, 'ass_staff_id')->dropdownList(
                            ArrayHelper::map(\Yii::$app->db->createCommand("SELECT id,CONCAT(pname,' ',fname,' ',lname) as ass_name FROM caremanager WHERE hcode='$user->hospcode'")->queryAll(), 'id', 'ass_name')
                            , ['id' => 'ddl-province',
                        'prompt' => 'เลือกผู้ประเมิน']);
                    ?>
        <?=$form->field($model, 's_d1')->dropdownList(
        ArrayHelper::map(Dfeeding::find()->all(), 'score', 'name'), ['id' => 's_d1',
        'prompt' => 'เลือกรายการ'],'required');?>
        <!--//////-->
        <?=$form->field($model, 's_d2')->dropdownList(
        ArrayHelper::map(Dgrooming::find()->all(), 'score', 'name'), ['id' => 's_d2',
        'prompt' => 'เลือกรายการ']);?>
         <!--//////-->
        <?=$form->field($model, 's_d3')->dropdownList(
        ArrayHelper::map(Dtransfer::find()->all(), 'score', 'name'), ['id' => 's_d3',
        'prompt' => 'เลือกรายการ']);?>
          <!--//////-->
        <?=$form->field($model, 's_d4')->dropdownList(
        ArrayHelper::map(Dtoilet::find()->all(), 'score', 'name'), ['id' => 's_d4',
        'prompt' => 'เลือกรายการ']);?>
           <!--//////-->
        <?=$form->field($model, 's_d5')->dropdownList(
        ArrayHelper::map(Dmobility::find()->all(), 'score', 'name'), ['id' => 's_d5',
        'prompt' => 'เลือกรายการ']);?>
              <!--//////-->
        <?=$form->field($model, 's_d6')->dropdownList(
        ArrayHelper::map(Ddressing::find()->all(), 'score', 'name'), ['id' => 's_d6',
        'prompt' => 'เลือกรายการ']);?>
                     <!--//////-->
        <?=$form->field($model, 's_d7')->dropdownList(
        ArrayHelper::map(Dstairs::find()->all(), 'score', 'name'), ['id' => 's_d7',
        'prompt' => 'เลือกรายการ']);?>
                        <!--//////-->
        <?=$form->field($model, 's_d8')->dropdownList(
        ArrayHelper::map(Dbathing::find()->all(), 'score', 'name'), ['id' => 's_d8',
        'prompt' => 'เลือกรายการ']);?>
                         <!--//////-->
        <?=$form->field($model, 's_d9')->dropdownList(
        ArrayHelper::map(Dbowels::find()->all(), 'score', 'name'), ['id' => 's_d9',
        'prompt' => 'เลือกรายการ']);?>
                          <!--//////-->
        <?=$form->field($model, 's_d10')->dropdownList(
        ArrayHelper::map(Dbladder::find()->all(), 'score', 'name'), ['id' => 's_d10',
        'prompt' => 'เลือกรายการ'],'required');?>
        <?php $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one(); ?>
       
       <?=$form->field($model, 'cid')->hiddenInput(['value'=> $person->cid])->label(false); ?>
       <?=$form->field($model, 'hcode')->hiddenInput(['value'=> $person->hcode])->label(false); ?>                   
                          
    <div class="form-group">
        <?= Html::submitButton('บันทึก' ,['class' => 'btn btn-success', 'id'=>'bomkeen','data' => [
           
            //'data-dismiss'=>"alert"
              //  'confirm' => 'ทำการบันทึกรายการหรือไม่'
            ]
            ]) ?>
    </div>
                          
    <?php ActiveForm::end(); ?>
                          
        </div>
    </div>
                          
    </div>
    <?php 
//   $this->registerJs("$('form#demo').on('beforeSubmit', function() {
//       krajeeDialog.confirm('Are you sure you want to proceed?', function (result) {
//        if (result) {
//            alert('Great! You accepted!');
//        } else {
//            alert('Oops! You declined!');
//        }
//    });
//    
//})
//        ");

       $this->registerJs("$('#bomkeen').on('click', function() {
    var d1=parseInt(document.getElementById('s_d1').value);
    var d2 = parseInt(document.getElementById('s_d2').value);
    var d3=parseInt(document.getElementById('s_d3').value);
    var d4 = parseInt(document.getElementById('s_d4').value);
    var d5=parseInt(document.getElementById('s_d5').value);
    var d6 = parseInt(document.getElementById('s_d6').value);
    var d7=parseInt(document.getElementById('s_d7').value);
    var d8 = parseInt(document.getElementById('s_d8').value);
    var d9=parseInt(document.getElementById('s_d9').value);
    var d10 = parseInt(document.getElementById('s_d10').value);
    var sum=d1+d2+d3+d4+d5+d6+d7+d8+d9+d10;
if (sum <= 4) {
    var g = 'กลุ่มที่ 3';
}
if (sum >= 5 && sum <=11) {
    var g = 'ผู้สูงอายุกลุ่ม 2 ผู้สูงอายุที่ดูแลตนเองได้บ้าง ช่วยเหลือตนเองได้บ้าง (กลุ่มติดบ้าน)';
}
if (sum >= 12) {
    var g = 'ผู้สูงอายุกลุ่ม 1 ผู้สูงอายุที่พึ่งตนเองได้ ช่วยเหลือผู้อื่น ชุมชนและสังคมได้ (กลุ่มติดสังคม)';
}
        if(!confirm('คะแนนรวม '+sum+' คะแนน   '+g)){
       return false;
       }   
    })
        ");
   
    
    ?>
</div>
