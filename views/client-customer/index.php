<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ClientCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Client Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'first_name',
            'last_name',
            'billing_card',
            // 'email_1:email',
            // 'email_2:email',
            // 'email_3:email',
            // 'alt_emails:email',
            // 'phone_1',
            // 'phone_2',
            // 'phone_3',
            // 'alt_phones',
            // 'address',
            // 'birthday',
            // 'note',
            // 'created',
            // 'updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
