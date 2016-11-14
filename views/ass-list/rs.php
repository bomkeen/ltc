<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dektrium\user\models\Profile;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyList */
include_once '../inc/thaidate.php';
$this->title = "การประเมินผู้สูงอายุที่มีภาวะพึ่งพิงออกเป็น 4 กลุ่มตามเกณฑ์ สปสช. ของ " . $person->pname . " " . $person->fname . " " . $person->lname;
$this->params['breadcrumbs'][] = ['label' => 'ประเมิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header">
    <h3><?= Html::encode($this->title) ?></h3>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">
            <h3> <span class="label label-danger">ประเมินวันที่.<?php echo thaidate($model->create_date); ?></span></h3>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4> ผลการประเมิน คะแนนรวม <?php echo $model->s_sum; ?> คะแนน </h4>
                </div>
                <div class="panel-body">
                    <h4> <?php
                        echo $model->AdlgroupaliasName;
                        ?></h4>
                </div>
            </div>
            <h3> <span class="label label-warning">คัดกรองวันที่.<?php echo thaidate($person->survey_date); ?></span></h3>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4> ผลการคัดกรอง คะแนนรวม <?php echo $person->survey_score; ?> คะแนน </h4>
                </div>
                <div class="panel-body">
                    <h4> <?php
                        echo $person->AdlgroupaliasName;
                        ?></h4>
                </div>
            </div>

            <center>
                <?= Html::a('แก้ไขการประเมิน', ['edit', 'id' => $model->id, 'cid' => $model->cid], ['class' => 'btn btn-warning']) ?>


            </center>
        </div>

        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5>ประเมินผู้สูงอายุที่มีภาวะพึ่งพิง</h5>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>


                    <?= $form->field($model, 'nhso_score')->radioList(ArrayHelper::map(\Yii::$app->db->createCommand("SELECT score,name  FROM nhso_score ")->queryAll(), 'score', 'name'))->label(false); ?>
                    <?php $user = Profile::find()->where(['user_id' => \Yii::$app->user->identity->getId()])->one(); ?>
                    <?=
                    $form->field($model, 'ass_staff_id')->dropdownList(
                            ArrayHelper::map(\Yii::$app->db->createCommand("SELECT id,CONCAT(pname,' ',fname,' ',lname) as ass_name FROM caremanager WHERE hcode='$user->hospcode'")->queryAll(), 'id', 'ass_name')
                            , ['id' => 'ddl-province',
                        'prompt' => 'เลือกผู้ประเมิน']);
                    ?>
                    <div class="form-group">
                        <?=
                        Html::submitButton('บันทึก', ['class' => 'btn btn-success', 'id' => 'bomkeen', 'data' => [
                                'confirm' => 'ทำการบันทึกรายการหรือไม่'
                            ]
                        ])
                        ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    </div>




</div>