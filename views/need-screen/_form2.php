<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Need11;
use app\models\Need12;
use app\models\Need13;
use app\models\Need21;
use app\models\Need22;
use app\models\Need132;

?>
<h3>ด้านที่ 1 ความต้องการในการดูแลทางการแพทย์</h3>

<div class="need-screen-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'need1_2')
        ->checkBoxList(ArrayHelper::map(Need12::find()->all(),'id','detail')) ?>
    <p><h5><B>1.3 การส่งปรึกษาสหวิชาชีพด้านการฟื้นฟูสมรรถภาพ<B></h5></p>
         
     <?= $form->field($model, 'need1_3')
         ->checkBoxList(ArrayHelper::map(Need13::find()->all(),'id','detail')) ?>
    <?= $form->field($model, 'need1_3_2')
         ->checkBoxList(ArrayHelper::map(Need132::find()->all(),'id','detail')) ?>
    <div class="page-header">
        <h3>ด้านที่ 2 ความต้องการในการดูแลทางสังคม</h3>
    </div>
    <?= $form->field($model, 'need2_1')
        ->checkBoxList(ArrayHelper::map(Need21::find()->all(),'id','detail')) ?>
    <?= $form->field($model, 'need2_2')
         ->checkBoxList(ArrayHelper::map(Need22::find()->all(),'id','detail')) ?>
    <div class="form-group">
        <?= Html::submitButton('ถัดไป ',['class' =>'btn btn-success btn-lg glyphicon glyphicon-arrow-right'
            ,'data' => ['confirm' => 'ทำการบันทึกรายการหรือไม่']
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
