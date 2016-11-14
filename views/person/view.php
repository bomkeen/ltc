<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'ข้อมูลของ: ' . $model->pname .' '.$model->fname .' '.$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>
     <p>
        <?= Html::a('Update', ['update', 'id' => $model->cid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'hcode',
            'hname',
            'cid',
            'pname',
            'fname',
            'lname',
            'sex',
            'birth_date',
            'age_now',
            //'ptype',
            'ptname',
            'hmain',
            'hsub',
            //'addressid',
            'house_num',
            'moo',
            //'tmbpart',
            'tambon',
            //'amppart',
            'ampart',
            //'chwpart',
            'province',
            'educationaliasname',
            'occupationaliasname',
            'chronic',
            'religion',
            'fstatus',
            'tel',
            'discharge',
            'ddischarge',
            'update_status',
            'update_user',
            'update_date',
        ],
    ]) ?>

</div>
