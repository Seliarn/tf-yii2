<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\IncomeCashboxOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\IncomeCashboxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = IncomeCashboxOrder::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "income-cashbox-order-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'code',
			'date:datetime',
			[
				'attribute' => 'operation_id',
				'label' => IncomeCashboxOrder::$labels['operation_id'],
				'content' => function ($model) {
						$data = $model->getOperation()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'account_id',
				'label' => IncomeCashboxOrder::$labels['account_id'],
				'content' => function ($model) {
						$data = $model->getAccount()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'account_book_id',
				'label' => IncomeCashboxOrder::$labels['account_book_id'],
				'content' => function ($model) {
						$data = $model->getAccountBook()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'cash_flow_statement_id',
				'label' => IncomeCashboxOrder::$labels['cash_flow_statement_id'],
				'content' => function ($model) {
						$data = $model->getCashFlowStatement()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'subconto_id',
				'label' => IncomeCashboxOrder::$labels['subconto_id'],
				'content' => function ($model) {
						$data = $model->getSubconto()->one();
						return (!$data) ? false : $data->username;
					}
			],
			[
				'attribute' => 'contractor_id',
				'label' => IncomeCashboxOrder::$labels['contractor_id'],
				'content' => function ($model) {
						$data = $model->getContractor()->one();
						return (!$data) ? false : $data->company;
					}
			],
			// 'note:ntext',
			'amount',
			[
				'attribute' => 'currency_id',
				'label' => IncomeCashboxOrder::$labels['currency_id'],
				'content' => function ($model) {
						$data = $model->getCurrency()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'note:ntext',
			[
				'attribute' => 'status',
				'label' => IncomeCashboxOrder::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
