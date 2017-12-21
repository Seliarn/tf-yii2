<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProductOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ProductOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ProductOrder::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "product-order-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . ProductOrder::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			[
				'attribute' => 'customer_id',
				'label' => ProductOrder::$labels['customer_id'],
				'content' => function ($model) {
						$data = $model->getCustomer()->one();
						return (!$data) ? false : $data->email_1;
					}
			],
			[
				'attribute' => 'product_order_status_id',
				'label' => ProductOrder::$labels['product_order_status_id'],
				'content' => function ($model) {
						$data = $model->getProductOrderStatus()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'note',
			'client_note',
			'created:date',
			'updated:date',
			[
				'attribute' => 'status',
				'label' => ProductOrder::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
