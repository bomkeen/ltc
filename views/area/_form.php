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
use app\models\Opt;
?>

<div class="area-form">
    <div class="container-fluid">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-1">
                <?= $form->field($model, 'moo')->textInput(['minlength' => true]) ?> 
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'moo_name')->textInput(['maxlength' => true]) ?> 
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
                        'url' => Url::to(['/area/get-amphur'])
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
                        'url' => Url::to(['/area/get-district'])
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?=
                $form->field($model, 'opt_code')->widget(Select2::classname(), [
                    'language' => 'th',
                    'data' => ArrayHelper::map(Opt::find()->all(), 'opt_code', 'opt_name'),
                    'options' => ['placeholder' => 'เลือกกองทุน...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-5">
                <?=
                        $form->field($model, 'hcode_name')
                        ->textInput(['readonly' => TRUE
                            , 'value' => $profile->hospcode_name
                            , 'maxlength' => true])
                ?>  
            </div>
        </div>
        <?= $form->field($model, 'user_id_create')->hiddenInput(['value' => \Yii::$app->user->identity->getId()])->label(false); ?>
        <?= $form->field($model, 'hcode')->hiddenInput(['value' =>$profile->hospcode])->label(false); ?>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
        <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-block btn-info' : 'btn btn-block btn-info']) ?>
        </div>
            </div>        </div>
<?php ActiveForm::end(); ?>
    </div>
</div>
