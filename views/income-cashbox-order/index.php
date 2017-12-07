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
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . IncomeCashboxOrder::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
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
				'label' => IncomeCashboxOrder::attributeLabels('operation_id'),
				'content' => function ($data) {
						return $data->getOperation()->one()->title;
					}
			],
			[
				'attribute' => 'account_id',
				'label' => IncomeCashboxOrder::attributeLabels('account_id'),
				'content' => function ($data) {
						return $data->getAccount()->one()->title;
					}
			],
			[
				'attribute' => 'cash_flow_statement_id',
				'label' => IncomeCashboxOrder::attributeLabels('cash_flow_statement_id'),
				'content' => function ($data) {
						return $data->getCashFlowStatement()->one()->title;
					}
			],
			[
				'attribute' => 'subcount_id',
				'label' => IncomeCashboxOrder::attributeLabels('subcount_id'),
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
				'label' => IncomeCashboxOrder::attributeLabels('status'),
				'content' => function ($data) {
						return $data->getStateAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
