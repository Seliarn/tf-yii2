<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Приходные кассовые ордеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-cashbox-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'operation_id',
            'account_id',
            'cash_flow_statement_id',
            'note:ntext',
            'subcount_id',
            'amount',
            'created',
            'updated',
            'status',
        ],
    ]) ?>

</div>
