<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = 'แก้ไขข้อมูลพื้นที่รับผิดชอบงานของหน่วยบริการ';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-update">

    <h3><font color='red'><?= Html::encode($this->title) ?></font></h3>

    <?= $this->render('_form', [
        'model' => $model,'amppart'=>$amppart,'tmbpart'=>$tmbpart,'profile'=>$profile
    ]) ?>

</div>
