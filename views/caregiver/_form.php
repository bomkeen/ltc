<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Cprename;
use app\models\Caregiver;
use app\models\Ceducation;

?>

<div class="caregiver-form">
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
<?= $form->field($model, 'cid')->textInput(['minlength' => true]) ?>
            </div>
        </div>
         <div class="row">
            
            <div class="col-md-2">
<?= $form->field($model, 'sex')->inline()->radioList(Caregiver::itemAlias('sex')) ?>
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
                <div class="col-md-3">
                <?= $form->field($model, 'exp')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
             <div class="col-md-3">
                <?=
                $form->field($model, 'train_name')->dropdownList(
                        Caregiver::itemAlias('train_name'), [
                    'prompt' => 'เลือกหลักสูตร']);
                ?>
            </div>
           <div class="col-md-3">
                <?= $form->field($model, 'train_name_other')->textInput(['maxlength' => true]) ?>
            </div>
             <div class="col-md-3">
                <?= $form->field($model, 'train_dep')->textInput(['maxlength' => true]) ?>
            </div>
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
        </div>
        <div class="row">
             <div class="col-md-1">
                <?= $form->field($model, 'moo')->textInput(['minlength' => true]) ?> 
            </div>
           <div class="col-md-3">
                <?=
                $form->field($model, 'chwpart')->dropdownList(
                        ArrayHelper::map(Province::find()->all()
                                , 'PROVINCE_CODE', 'PROVINCE_NAME')
                        , ['id' => 'ddl-province',
                    'prompt' => 'เลือกจังหวัด']);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                $form->field($model, 'amppart')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur'],
                    'data' => $amppart,
                    'pluginOptions' => [
                        'depends' => ['ddl-province'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/caregiver/get-amphur'])
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                $form->field($model, 'tmbpart')->widget(DepDrop::classname(), [
                    'data' => $tmbpart,
                    'pluginOptions' => [
                        'depends' => ['ddl-province', 'ddl-amphur'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/caregiver/get-district'])
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            
       
         <div class="col-md-3">
                <?= $form->field($model, 'status')->inline()->radioList(Caregiver::itemAlias('status')) ?>
            </div>
        </div>
  <?= $form->field($model, 'create_by')->hiddenInput(['value' => \Yii::$app->user->identity->getId()])->label(false); ?>
    <?= $form->field($model, 'hcode')->hiddenInput(['value' =>$profile->hospcode])->label(false); ?>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-block btn-info' : 'btn btn-block btn-info'
            ,'data' => ['confirm' => 'ทำการบันทึกรายการหรือไม่']
            ]) ?>
    </div>    </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
