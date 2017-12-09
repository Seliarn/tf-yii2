<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffEmployee */

$this->title = Yii::$app->params['translate']['rus']['btn-update'] . ' ' . $model::$titles['rus']['main'] . ': ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::$app->params['translate']['rus']['btn-update'];
?>
<div class="staff-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'department' => $department,
		'position' => $position,
    ]) ?>

</div>
