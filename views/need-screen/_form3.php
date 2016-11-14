<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Need23;
use app\models\Need24;
use app\models\Need25;
use dektrium\user\models\Profile;
$user = Profile::find()->where(['user_id' => \Yii::$app->user->identity->getId()])->one();
?>
  <h3>ด้านที่ 2 ความต้องการในการดูแลทางสังคม</h3>
<div class="need-screen-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'need2_3')
        ->checkBoxList(ArrayHelper::map(Need23::find()->all(),'id','detail')) ?>
    <?= $form->field($model, 'need2_4')
         ->checkBoxList(ArrayHelper::map(Need24::find()->all(),'id','detail')) ?>
  
    <?= $form->field($model, 'need2_5')
        ->checkBoxList(ArrayHelper::map(Need25::find()->all(),'id','detail')) ?>
    <div class="page-header">
         <h3>ด้านที่ 3 ความต้องการในการดูแลด้านอื่นๆ </h3>
    </div>
    <?= $form->field($model, 'need_other')->textarea(array('rows'=>2,'cols'=>5)); ?>
<div class="page-header">
         <h3>ด้านที่ 4 การนัดหมาย  </h3>
    </div>
    <div class="row">
    <div class="col-md-4">
         <?=
                $form->field($model, 'oapp_p')->dropdownList(app\models\NeedScreen::itemAlias('c_oapp_p')
                        , ['prompt' => 'เลือกช่วงในการนัดหมาย']);
                ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'oapp_date')->widget(DatePicker::classname(), [
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
    </div>
        
        <div class="col-md-4">
             <?=
                        
                    $form->field($model, 'caremanager_id')->dropdownList(
                            ArrayHelper::map(\Yii::$app->db->createCommand("SELECT id,CONCAT(pname,' ',fname,' ',lname) as ass_name FROM caremanager WHERE hcode='$user->hospcode'")->queryAll(), 'id', 'ass_name')
                            , ['id' => 'ddl-province',
                        'prompt' => 'เลือกผู้ประเมิน']);
                    ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('ถัดไป ',['class' =>'btn btn-success btn-lg glyphicon glyphicon-arrow-right'
            ,'data' => ['confirm' => 'ทำการบันทึกรายการหรือไม่']
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
