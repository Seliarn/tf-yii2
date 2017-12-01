<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

$this->title = 'Update Income Cashbox Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Income Cashbox Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="income-cashbox-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
