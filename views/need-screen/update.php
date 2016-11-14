<?php

use yii\helpers\Html;
include_once '../inc/thaidate.php';
/* @var $this yii\web\View */
/* @var $model app\models\NeedScreen */

$this->title = 'แก้ไขการประเมินความต้องการได้รับการดูแลของผู้สูงอายุ';
//$this->params['breadcrumbs'][] = ['label' => 'Need Screens', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="need-screen-update">
    <h3><font color="#F44336"><?= Html::encode($this->title) ?></font></h3>
   
    <div class="row">
        <div class="container-fluid">
              <div class="col-md-10 col-md-offset-1">
            
               <table class="table table-responsive table-striped">
                   <tr>
                       <th colspan="2">เลขบัตรประชาชน:: <?php echo $person->cid ;?> &nbsp &nbsp &nbspชื่อ-สกุล:: <?php echo $person->pname." ".$person->fname." ".$person->lname;?></th>
                       
                   </tr>
                   <tr>
                       <th colspan="2">ผลประเมิน ADL :: <?php echo $person->AdlassaliasName ;?></th> 
                       
                   </tr>
                    <tr>
                       <th>ผลประเมินภาวะพึ่งพิง :: <?php echo $person->NhsogroupaliasName;?></th> 
                       <th>วันที่ทำการประเมิน :: <?php echo thaidate($person->nhso_score_date);?></th>
                   </tr>
            </table>  
            </div>
        </div>
    </div>
       <div class="row">
        <div class="container-fluid">
          
            <div class="col-md-9 col-md-offset-1">
    <?= $this->render('_form', [
        'model' => $model,'person'=>$person
    ]) ?>
</div>        </div>    </div>
</div>
