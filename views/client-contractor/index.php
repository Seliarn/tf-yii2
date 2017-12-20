<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ClientContractorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Contractors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-contractor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Client Contractor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'username',
            'type',
            // 'birthday',
            // 'title',
            // 'company',
            // 'director',
            // 'manager',
            // 'billing_card',
            // 'edrpou_code',
            // 'inn',
            // 'billing_address',
            // 'email:email',
            // 'alt_emails:email',
            // 'phone',
            // 'alt_phones',
            // 'address',
            // 'note',
            // 'created',
            // 'updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
