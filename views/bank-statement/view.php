<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankStatement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-statement-view">

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
            'flow_type',
            'payment_type',
            'account_id',
            'amount',
            'amount_vat',
            'vat',
            'author_id',
            'created',
            'updated',
            'status',
            'note',
        ],
    ]) ?>

</div>
