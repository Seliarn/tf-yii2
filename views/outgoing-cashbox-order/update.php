<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OutgoingCashboxOrder */

$this->title = 'Update Outgoing Cashbox Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outgoing Cashbox Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outgoing-cashbox-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
