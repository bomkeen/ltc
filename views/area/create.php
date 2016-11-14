<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = 'บันทึกข้อมูลพื้นที่รับผิดชอบงานของหน่วยบริการ';
//$this->params['breadcrumbs'][] = ['label' => 'พื้นที่รับผิดชอบ', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">
    <div class="row">
        <div class="container-fluid">
    <center>
    <h3><?= Html::encode($this->title) ?></h3>
    </center>
   
    </div>
    </div>
    <div class="well">
    <?= $this->render('_form', [
        'model' => $model,'profile'=>$profile,
         'amppart'=>[],
         'tmbpart'=>[]
    ]) ?>
    </div>
    <div class="row">
        <div class="container-fluid">
             <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hcode_name',
            'moo',
            'moo_name',
            'tmbpart_name',
            'amppart_name',
            'chwpart_name',
            'opt_code_name',
          

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
