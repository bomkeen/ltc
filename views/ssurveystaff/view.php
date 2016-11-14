<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\StaffType;


/* @var $this yii\web\View */
/* @var $model app\models\Ssurveystaff */

$this->title = $model->fname." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้สำรวจ', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssurveystaff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
       // 'template'=>'<tr><th>{label}</th><td><i class="glyphicon glyphicon-info-sign"></i></i> {value}</td></tr>',
        'attributes' => [
          ///  'id',
            'pname',
            'fname',
            'lname',
            'cid',
            'sex',
    [
                'label' => 'สถานะในชุมชน',
                'value' => $staff_type
            ],
            'birth_date:date',
            'create_by',
            'hcode',
        ],
    ]) ?>

</div>
