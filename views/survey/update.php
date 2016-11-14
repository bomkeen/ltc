<?php
use yii\helpers\Html;

$this->title = 'คัดกรอง ADL  ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h2>คัดกรองความสามารถในการด(นินชีวิตประจำวัน (Barthel ADL index) <br> <?php echo "ชื่อผู้สูงอายุ ".$person->pname." ".$person->fname." ".$person->lname ;?></h2>
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
             <?= Html::a(' กลับหน้ารายชื่อคัดกรอง ADL', ['survey/index'], ['class' => 'btn btn-warning glyphicon glyphicon-triangle-left']) ?>
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

