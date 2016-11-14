<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

use app\models\Cprename;
use app\models\Ssurveystaff;
use app\models\StaffType;
use app\models\Caremanager;
use app\models\Ceducation;
?>

<div class="ssurveystaff-form">
    <div class="container-fluid">
<?php $form = ActiveForm::begin(); ?>
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
             <div class="col-md-3">
                 <?=
                $form->field($model, 'job_id')->dropdownList(
                        ArrayHelper::map(\Yii::$app->db->createCommand("SELECT job_id,job_name FROM job ")->queryAll(), 'job_id', 'job_name')
                        , ['id' => 'ddl-province',
                    'prompt' => 'เลือกตำแหน่ง']);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                $form->field($model, 'education')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(Ceducation::find()->all(), 'educationcode', 'educationname'),
                    'options' => ['placeholder' => 'เลือกการศึกษา...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-3">
                <?=
                $form->field($model, 'education_type')->dropdownList(
                        Caremanager::itemAlias('education_type'), ['id' => 'ddl-province',
                    'prompt' => 'เลือกสาขา']);
                ?>
            </div>
               <div class="col-md-3">
                <?=
                $form->field($model, 'train_name')->dropdownList(
                        Caremanager::itemAlias('train_name'), ['id' => 'ddl-province',
                    'prompt' => 'เลือกหลักสูตร']);
                ?>
            </div>
           <div class="col-md-3">
                <?= $form->field($model, 'train_name_other')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'train_dep')->textInput(['maxlength' => true]) ?>
            </div>
        
        </div>
        <div class="row">
        
             <div class="col-md-3">
                <?=
$form->field($model, 'train_date')->widget(DatePicker::classname(), [
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
                <div class="col-md-3">
                <?= $form->field($model, 'train_hour')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'exp')->textInput(['maxlength' => true]) ?>
            </div>
       
         <div class="col-md-3">
                <?= $form->field($model, 'status')->inline()->radioList(Ssurveystaff::itemAlias('status')) ?>
            </div>
        </div>
        <div class="row">
        
            <div class="col-md-2 col-md-offset-5">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary'
                ,'data' => ['confirm' => 'ทำการบันทึกรายการหรือไม่']
                ]) ?>
        </div>
            </div>
 </div>
        <?php ActiveForm::end(); ?>

    </div>


</div>
