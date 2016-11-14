<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SurveyList */

$this->title = 'Create Survey List';
$this->params['breadcrumbs'][] = ['label' => 'Survey Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
