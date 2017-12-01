<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\IncomeCashboxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Income Cashbox Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-cashbox-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Income Cashbox Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'operation_id',
            'account_id',
            'cash_flow_statement_id',
            // 'note:ntext',
            // 'subcount_id',
            // 'amount',
            // 'created',
            // 'updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
