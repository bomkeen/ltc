<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Need11;


?>

<div class="need-screen-form">
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-4">
         <?= $form->field($model, 'need_screen_date')->widget(DatePicker::classname(), [
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
    </div></div>
  
    <div class="row"><h3>ด้านที่ 1 ความต้องการในการดูแลทางการแพทย์</h3></div>
<?=$form->field($model, 'cid')->hiddenInput(['value'=> $person->cid])->label(false); ?>
<?=$form->field($model, 'hcode')->hiddenInput(['value'=> $person->hcode])->label(false); ?>
   
<?= $form->field($model, 'need1_1')
        ->checkBoxList(ArrayHelper::map(Need11::find()->all(),'id','detail')) ?>
<div class="form-group">
        <?= Html::submitButton('ถัดไป ',['class' =>'btn btn-success btn-lg glyphicon glyphicon-arrow-right'
            ,'data' => ['confirm' => 'ทำการบันทึกรายการหรือไม่']
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
