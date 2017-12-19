<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientCustomer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-customer-view">

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
            'username',
            'first_name',
            'last_name',
            'billing_card',
            'email_1:email',
            'email_2:email',
            'email_3:email',
            'alt_emails:email',
            'phone_1',
            'phone_2',
            'phone_3',
            'alt_phones',
            'address',
            'birthday',
            'note',
            'created',
            'updated',
            'status',
        ],
    ]) ?>

</div>
