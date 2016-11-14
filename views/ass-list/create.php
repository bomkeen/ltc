<?php
use yii\helpers\Html;

$this->title = 'ประเมินหาผู้สูงอายุที่มีภาวะพึ่งพิง  ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
include_once '../inc/thaidate.php';
?>
<div class="page-header">
    <h3><font color="#3F51B5">ประเมินหาผู้สูงอายุที่มีภาวะพึ่งพิง <?php echo $person->pname." ".$person->fname." ".$person->lname ;?></font></h3>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <table class="table table-responsive">
                <tr>
                    <th class="bg-info">บัตรประชาชน</th>
                    <td><?php echo $person->cid ;?></td>
                    <th class="bg-info">อายุ</th>
                    <td><?php echo $person->age_now ;?></td>
                    
                </tr>
                <tr>
                    <th class="bg-info">สิทธิการรักษา</th>
                    <td colspan="3"><?php echo $person->ptname ;?></td>
                </tr>
                <tr>
                    <th class="bg-info">สถานพยาบาลหลัก</th>
                    <td colspan="3"><?php echo $person->hmainname ;?></td>
                </tr>
                 <tr>
                    <th class="bg-info">โรคประจำตัว</th>
                    <td colspan="3"><?php echo $person->chronicname ;?></td>
                </tr>
                <tr>
                    <th class="bg-info">ที่อยู่</th>
                    <td colspan="5"><?php echo "บ้านเลขที่ ".$person->house_num." หมู่ ".$person->moo
                            ." ต. ".$person->tambon." อ.".$person->ampart." จ.".$person->province ;?></td>
                </tr>
                 <tr>
                    <th class="bg-info">Tel.</th>
                    <td colspan="3"><?php echo $person->tel ;?></td>
                </tr>
            </table>
            <h3> <span class="label label-info">คัดกรองวันที่.<?php echo thaidate($person->survey_date); ?></span></h3>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4> ผลการคัดกรอง คะแนนรวม <?php echo $person->survey_score; ?> คะแนน </h4><br>
                    ผู้สำรวจ <?php echo " ".$staff->pname." ".$staff->fname." ".$staff->lname ; ?>
                </div>
                <div class="panel-body">
                    <h4> <?php
                        echo $person->AdlgroupaliasName;
                        ?></h4>
                </div>
            </div>
             <?= Html::a(' กลับหน้ารายชื่อประเมิน', ['ass/index'], ['class' => 'btn btn-warning glyphicon glyphicon-triangle-left']) ?>
        </div>
        
        
        <!--/////Form ////////-->
        
        <div class="col-md-7">
            
            <?= $this->render('_form', [
                'model' => $model,
                'person'=>$person
            ]) ?>
            
        </div>
        
    </div>
</div>

