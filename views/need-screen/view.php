<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Caremanager;

include_once '../inc/thaidate.php';
/* @var $this yii\web\View */
/* @var $model app\models\NeedScreen */

$this->title = 'การประเมินความต้องการ ของ'.$person->pname." ".$person->fname." ".$person->lname;
$this->params['breadcrumbs'][] = ['label' => 'การประเมินความต้องการ ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="need-screen-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
       
            <div class="col-md-3 col-md-offset-9">
     <?= Html::a('กลับ', ['list', 'id' => $model->cid], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id,'cid'=>$model->cid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            </div>
       
    </div>
    <br>
    <div class="row">
    <table class="table">
        <tr>
            <th colspan="2" class="bg-primary">ด้านที่ 1 ความต้องการในการดูแลทางการแพทย์</th>
        </tr>
        <tr>
            <th colspan="2">1.1 การตรวจรักษาเพิ่มเติมจากแพทย์ หรือพยาบาลเกี่ยวกับ</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php 
if($model->need1_1<>''){
$rs = \Yii::$app->db->createCommand("select detail from need1_1 where id in ($model->need1_1);")->queryAll();
foreach ($rs as $r) {
    echo "::".$r['detail']."<br />\n";
   
}}?> 
            </td>
        </tr>
<!--        /////////////////////////-->
         <tr>
            <th colspan="2">1.2 การได้รับเครื่องมือ/อุปกรณ์ช่วย</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php 
if($model->need1_2<>''){
$rs2 = \Yii::$app->db->createCommand("select detail from need1_2 where id in ($model->need1_2);")->queryAll();
foreach ($rs2 as $r2) {
    echo "::".$r2['detail']."<br />\n";
}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
<!--              /////////////////////////-->
         <tr>
            <th colspan="2">1.3 การส่งปรึกษาสหวิชาชีพด้านการฟื้นฟูสมรรถภาพ</th>
        </tr>
        <tr>
            <td colspan="2" class="bg-info">นักกิจกรรมบำบัด ในหัวข้อบริการ::</td>
            
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need1_3<>''){
$rs3 = \Yii::$app->db->createCommand("select detail from need1_3 where id in ($model->need1_3);")->queryAll();
foreach ($rs3 as $r3) {echo "::".$r3['detail']."<br />\n";}}?> 
            </td>
        </tr>
         <tr>
            <td colspan="2" class="bg-info">นักกายภาพบำบัด ในหัวข้อบริการ::</td>
            
        </tr>
         <tr>
            <td></td>
            <td>
<?php if($model->need1_3_2<>''){
$rs3 = \Yii::$app->db->createCommand("select detail from need1_3_2 where id in ($model->need1_3_2);")->queryAll();
foreach ($rs3 as $r3) {echo "::".$r3['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
        <tr>
            <th colspan="2" class="bg-primary">ด้านที่ 2 ความต้องการในการดูแลทางสังคม</th>
        </tr>
        <!--              /////////////////////////-->
         <tr>
            <th colspan="2">2.1 ผู้สูงอายุต้องการผู้ดูแลลักษณะใด</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need2_1<>''){
$rs4 = \Yii::$app->db->createCommand("select detail from need2_1 where id in ($model->need2_1);")->queryAll();
foreach ($rs4 as $r4) {echo "::".$r4['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
  <!--              /////////////////////////-->
         <tr>
            <th colspan="2">2.2 รูปแบบการบริการในบ้าน คือ ผู้ดูแลฝึกและช่วยเหลือในด้าน</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need2_2<>''){
$rs5 = \Yii::$app->db->createCommand("select detail from need2_2 where id in ($model->need2_2);")->queryAll();
foreach ($rs5 as $r5) {echo "::".$r5['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
 <!--              /////////////////////////-->
         <tr>
            <th colspan="2">2.3 รูปแบบการบริการในชุมชน/เครือข่ายด้าน</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need2_3<>''){
$rs6 = \Yii::$app->db->createCommand("select detail from need2_3 where id in ($model->need2_3);")->queryAll();
foreach ($rs6 as $r6) {echo "::".$r6['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
<!--              /////////////////////////-->
         <tr>
            <th colspan="2">2.4 การปรับสภาพแวดล้อมและ/หรือการปรับสภาพบ้านและ/หรือการจัดซื้อและ/หรือการจัดจ้างทําอุปกรณ์</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need2_4<>''){
$rs7 = \Yii::$app->db->createCommand("select detail from need2_4 where id in ($model->need2_4);")->queryAll();
foreach ($rs7 as $r7) {echo "::".$r7['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
<!--              /////////////////////////-->
         <tr>
            <th colspan="2">2.5 การหารายได้และความมั่นคงในครอบครัว</th>
        </tr>
        <tr>
            <td></td>
            <td>
<?php if($model->need2_5<>''){
$rs8 = \Yii::$app->db->createCommand("select detail from need2_5 where id in ($model->need2_5);")->queryAll();
foreach ($rs8 as $r8) {echo "::".$r8['detail']."<br />\n";}}?> 
            </td>
        </tr>
<!--        /////////////////////-->
<tr>
            <th colspan="2" class="bg-primary">ด้านที่ 3 ความต้องการในการดูแลด้านอื่นๆ </th>
        </tr>
        <tr>
            <td></td>
            <td>
                <?php echo "ความต้องการอื่นๆ ::".$model->need_other ;?>
            </td>
        </tr>
        <tr>
            <th colspan="4" class="bg-primary">ด้านที่ 4 การนัดหมาย  </th>
        </tr>
        <tr>
            <td></td>
            <td><?php echo "นัดหมายเพื่อประเมินซ้ำภายใน ::".$model->oapp_p ;?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo "วันที่นัดหมายในการประเมินครั้งต่อไป ::".thaidate($model->oapp_date) ;?></td>
        </tr>
        <tr>
            <td></td>
            <?php $care=  Caremanager::findOne($model->caremanager_id) ;?>
             <td><?php echo "ผู้ประเมิน ::".$care->pname." ".$care->fname." ".$care->lname ;?></td>
        </tr>
    </table>
</div>


</div>
