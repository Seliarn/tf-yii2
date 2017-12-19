<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientContractor */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Client Contractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-contractor-view">

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
            'title',
            'company',
            'director',
            'manager',
            'billing_card',
            'edrpou_code',
            'inn',
            'billing_address',
            'email_1:email',
            'email_2:email',
            'email_3:email',
            'alt_emails:email',
            'phone_1',
            'phone_2',
            'phone_3',
            'alt_phones',
            'address',
            'note',
            'created',
            'updated',
            'status',
        ],
    ]) ?>

</div>
