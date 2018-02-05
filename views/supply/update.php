<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supply */

$this->title = 'Update Supply: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
