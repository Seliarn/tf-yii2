<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientContractor */

$this->title = 'Update Client Contractor: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Client Contractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-contractor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
