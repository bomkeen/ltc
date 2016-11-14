<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ssurveystaff */

$this->title = 'Update Ssurveystaff: ' . $model->fname." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Ssurveystaff', 'url' => ['create']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ssurveystaff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
