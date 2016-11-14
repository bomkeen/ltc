<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'เพิ่มข้อมูลใหม่';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้สูงอายุ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">
    <div class="page-header">
    <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'amppart'=>[],
        'tmbpart'=>[]
    ]) ?>

</div>
