<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


use app\models\Cprename;
use app\models\Ssurveystaff;
use app\models\StaffType;
?>

<div class="ssurveystaff-form">
    <div class="container-fluid">
    <?php $form = ActiveForm::begin([]); ?>
        <div class="row">
            <div class="col-md-2">
                 <?=
                $form->field($model, 'pname')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(Cprename::find()->all(), 'prename', 'prename'),
                    'options' => ['placeholder' => 'เลือกคำนำหน้า'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                 <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
         
            <div class="col-md-2">
                <?= $form->field($model, 'sex')->inline()->radioList(Ssurveystaff::itemAlias('sex')) ?>
            </div>
            
            <div class="col-md-3">
                 <?=
                $form->field($model, 'staff_type_id')->dropdownList(
                        ArrayHelper::map(StaffType::find()->all(), 'staff_type_id', 'staff_type_name'), ['id' => 'ddl-province',
                    'prompt' => 'เลือกสถานะในชุมชน']);
                ?>
            </div>
            <div class="col-md-3">
            <?=
$form->field($model, 'birth_date')->widget(DatePicker::classname(), [
    'language' => 'th',
    'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'showAnim' => 'slide',  //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth' => true,
        'changeYear' => true,
        'yearRange' => '1800:2020',
    ],
    'options' => ['class' => 'form-control']
])
?>
        </div>
            <div class="col-md-4">
                <?= $form->field($model, 'status')->inline()->radioList(Ssurveystaff::itemAlias('status')) ?>
            </div>
        </div>
        <div class="row">
        
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary']) ?>
    </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    </div>
        
        
</div>
