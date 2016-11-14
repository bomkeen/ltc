<?php

use yii\helpers\Html;
include_once '../inc/thaidate.php';

/* @var $this yii\web\View */
/* @var $model app\models\NeedScreen */

$this->title = 'ประเมินความต้องการได้รับการดูแลของผู้สูงอายุ';
//$this->params['breadcrumbs'][] = ['label' => 'Need Screens', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="need-screen-create">
   
    <h4><?= Html::encode($this->title) ?></h4>
   
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
                <?php if($page==1) {?>
    <?= $this->render('_form', [
        'model' => $model,'person'=>$person
    ]) ?>
                <?php  } ?>
                 <?php if($page==2) {?>
    <?= $this->render('_form2', [
        'model' => $model,'person'=>$person
    ]) ?>
                <?php  } ?>
                <?php if($page==3) {?>
    <?= $this->render('_form3', [
        'model' => $model,'person'=>$person
    ]) ?>
                <?php  } ?>
            </div>        </div>    </div>
</div>
