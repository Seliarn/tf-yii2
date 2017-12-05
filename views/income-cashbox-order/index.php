<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\IncomeCashboxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приходные кассовые ордеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-cashbox-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать приходный кассовый ордер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
			[
				'attribute' => 'operation_id',
				'label' => 'Операция',
				'content' => function ($data) {
						return $data->getOperation()->one()->title;
					}
			],
			[
				'attribute' => 'account_id',
				'label' => 'Счет',
				'content' => function ($data) {
						return $data->getAccount()->one()->title;
					}
			],
			[
				'attribute' => 'cash_flow_statement_id',
				'label' => 'Статья ДДС',
				'content' => function ($data) {
						return $data->getCashFlowStatement()->one()->title;
					}
			],
			[
				'attribute' => 'subcount_id',
				'label' => 'Субконто',
				'content' => function ($data) {
						return $data->getSubcount()->one()->username;
					}
			],
            // 'note:ntext',
             'amount',
             'created:date',
             'updated:date',
			[
				'attribute' => 'status',
				'label' => 'Статус',
				'content' => function ($data) {
						return $data->getStateAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
