<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyList */
include_once '../inc/thaidate.php';
$this->title = "ผลหารคัดกรอง ADL ของ ".$person->pname." ".$person->fname." ".$person->lname;
$this->params['breadcrumbs'][] = ['label' => 'คัดกรอง ADL', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header">
      <h3><?= Html::encode($this->title) ?></h3>
</div>
  
<div class="container-fluid">
   
    <div class="row">
               <div class="col-md-4">
            <h3> <span class="label label-warning">คัดกรองวันที่.<?php echo thaidate($model->create_date) ;?></span></h3>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4> ผลการคัดกรอง คะแนนรวม <?php echo $model->s_sum ;?> คะแนน </h4>
            </div>
            <div class="panel-body">
                <h4> <?php 
                echo $model->AdlgroupaliasName;
                ?></h4>
            </div>
        </div>
    </div>
           <div class="col-md-4">
            <h3> <span class="label label-danger">ประเมินวันที่.<?php echo thaidate($model->create_date) ;?></span></h3>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4> ผลการประเมิน คะแนนรวม <?php echo $model->s_sum ;?> คะแนน </h4>
            </div>
            <div class="panel-body">
                <h4> <?php 
                echo $model->AdlgroupaliasName;
                ?></h4>
            </div>
        </div>
    </div>
    </div>


    <br>
    <div class="row">
        <center>
        <?= Html::a('แก้ไขการคัดกรอง', ['edit', 'id' => $model->id,'cid'=>$model->cid], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('ต่อไป', ['list', 'id' => $model->cid], ['class' => 'btn btn-success']) ?>
       
        </center>
    </div>



</div>