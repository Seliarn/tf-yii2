<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

$this->title = 'Create Income Cashbox Order';
$this->params['breadcrumbs'][] = ['label' => 'Income Cashbox Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-cashbox-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
