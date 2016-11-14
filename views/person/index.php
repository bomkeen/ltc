<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use dektrium\user\models\Profile;

$model = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();

$this->title = 'ข้อมูลผู้สูงอายุของ '.$model->hospcode_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">
    <div class="page-header">
           <h2><?= Html::encode($this->title) ?></h2>
     
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
           
             <?= Html::a('เพิ่มข้อมูลใหม่', ['create'], ['class' => 'btn btn-success']) ?>
        </div>  
        <div class="col-md-2 col-md-offset-7">
             <?php
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'exportConfig' => [
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_CSV => false,
            ExportMenu::FORMAT_EXCEL => false,
        ],
        'filename' => $this->title,
    ]);
    ?>
    </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row">
            <div class="col-md-12">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'hcode',
            //'hname',
            'cid',
            'pname',
            'fname',
            'lname',
            'sex',
            // 'birth_date',
            // 'age_now',
            // 'ptype',
            // 'ptname',
            // 'hmain',
            // 'hsub',
            // 'addressid',
            // 'house_num',
            'moo',
            // 'tmbpart',
            'tambon',
            // 'amppart',
            'ampart',
            // 'chwpart',
            'province',
            // 'education',
            // 'occupation',
            // 'chronic',
            // 'religion',
            // 'fstatus',
            // 'tel',
            // 'discharge',
            // 'ddischarge',
            // 'update_status',
            // 'update_user',
            // 'update_date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
        </div></div>
    </div>
</div>
    
