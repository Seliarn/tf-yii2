<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\OutgoingCashboxOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\OutgoingCashboxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = OutgoingCashboxOrder::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "income-cashbox-order-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . OutgoingCashboxOrder::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'code',
			[
				'attribute' => 'operation_id',
				'label' => OutgoingCashboxOrder::$labels['operation_id'],
				'content' => function ($data) {
						return $data->getOperation()->one()->title;
					}
			],
			[
				'attribute' => 'account_id',
				'label' => OutgoingCashboxOrder::$labels['account_id'],
				'content' => function ($data) {
						return $data->getAccount()->one()->title;
					}
			],
			[
				'attribute' => 'cash_flow_statement_id',
				'label' => OutgoingCashboxOrder::$labels['cash_flow_statement_id'],
				'content' => function ($data) {
						return $data->getCashFlowStatement()->one()->title;
					}
			],
			[
				'attribute' => 'subcount_id',
				'label' => OutgoingCashboxOrder::$labels['subcount_id'],
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
				'label' => OutgoingCashboxOrder::$labels['status'],
				'content' => function ($data) {
						return $data->getStateAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
