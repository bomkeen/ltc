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

use app\models\Coccupation;
use app\models\Creligion;
use app\models\Ceducation;
use app\models\Cchronic;
use app\models\Person;
use app\models\Cprename;
use app\models\Chospital;
use app\models\CinstypeOld;
use app\models\Ssurveystaff;
use dektrium\user\models\Profile;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
$juidate=  (int)date('Y')+543;
$jui_y=  ((int)$juidate-60);

$tmpday=  date('m-d');
$thaiday=$juidate.'-'.$tmpday;
?>

<div class="person-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-0">
                <?php 
                //$form->field($model, 'hname')->textInput(['readonly' => !$model->isNewRecord,'maxlength' => true]) 
                        ?>
            </div>
            <div class="col-md-3">

                <?= $form->field($model, 'cid')->textInput(['readonly' => !$model->isNewRecord,'maxlength' => true]) ?>
            </div>
            <div class="col-md-5">
                
            <?=
                $form->field($model, 'ptype')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(CinstypeOld::find()->all(), 'id_instype', 'instype_name'),
                    'options' => ['placeholder' => 'เลือกสิทธิ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-2">

                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
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
            <div class="col-md-2">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'sex')->inline()->radioList(Person::itemAlias('sex')) ?>
            </div>
            <?php if($model->isNewRecord) { ?>
             <div class="col-md-2">
                <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                        'defaultDate' => $jui_y.'-01-01'
                        //'defaultDate' => '2014-01-01'
                    ],
                    'options' => ['class' => 'form-control']
                ]) ?>
            </div>
            <?php } ?>
            <?php if(!$model->isNewRecord) { ?>
            <div class="col-md-1">
                <?= $form->field($model, 'age_now')->textInput(['readonly' => !$model->isNewRecord,'maxlength' => true]) ?>
            </div>
            <?php } ?>
        </div> 
        <div class="row">




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

                <?=
                $form->field($model, 'occupation')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(Coccupation::find()->all(), 'occupationcode', 'occupationname'),
                    'options' => ['placeholder' => 'เลือกอาชีพ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                $form->field($model, 'chronic')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(Cchronic::find()->all(), 'id_chronic', 'tchronic'),
                    'options' => ['placeholder' => 'เลือกโรคประจำตัว...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'house_num')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-1">
                <?= $form->field($model, 'moo')->textInput() ?>
            </div>

            <div class="col-md-3">
                <?=
                $form->field($model, 'chwpart')->dropdownList(
                        ArrayHelper::map(Province::find()->all(), 'PROVINCE_CODE', 'PROVINCE_NAME'), ['id' => 'ddl-province',
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
                        'url' => Url::to(['/person/get-amphur'])
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
                        'url' => Url::to(['/person/get-district'])
                    ]
                ]);
                ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-2">
                <?=
                $form->field($model, 'religion')->dropdownList(
                        ArrayHelper::map(Creligion::find()->all(), 'id_religion', 'religion'), [
                    'id' => 'ddl-province',
                    'prompt' => 'เลือกศาสนา'
                ]);
                ?>
            </div>
            <div class="col-md-2">
                <?=
                $form->field($model, 'fstatus')->dropdownList(Person::itemAlias('fstatus'), [
                    'id' => 'ddl-province',
                    'prompt' => 'เลือกสถานะสมรส'
                ]);
                ?>
            </div>
            

            <div class="col-md-2">
                <?=
                $form->field($model, 'discharge')->dropdownList(Person::itemAlias('discharge'), [
                    'id' => 'ddl-province',
                    'prompt' => 'สถานะการจำหน่าย'
                ]);
                ?>
            </div>
            <div class="col-md-2">
                <?=
                $form->field($model, 'ddischarge')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                       // 'defaultDate' => $thaiday
                    ],
                    'options' => ['class' => 'form-control']
                ])
                ?>
            </div>
            <div class="col-md-3">
                <?php $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one(); ?>
                <?=
                $form->field($model, 'survey_staff_id')->dropdownList(
                        ArrayHelper::map(\Yii::$app->db->createCommand("SELECT id,CONCAT(pname,' ',fname,' ',lname) as staff_name FROM ssurveystaff WHERE hcode='$user->hospcode'")->queryAll(), 'id', 'staff_name')
                        , ['id' => 'ddl-province',
                    'prompt' => 'เลือกผู้สำรวจ']);
                ?>
        </div>



        <div class="row">



            <div class="col-md-4 col-md-offset-4">
                <br>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'บันทึกข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
