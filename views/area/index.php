<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AreaScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บันทึกข้อมูลพื้นที่รับผิดชอบงานของหน่วยบริการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index">
    <center>
    <h3><?= Html::encode($this->title) ?></h3>
    </center>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hcode',
            'user_id_create',
            'addressid',
            'moo',
            // 'moo_name',
            // 'tmbpart',
            // 'tmbpart_name',
            // 'amppart',
            // 'amppart_name',
            // 'chwpart',
            // 'chwpart_name',
            // 'hcode_service',
            // 'hcode_service_name',
            // 'opt_code',
            // 'opt_code_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
