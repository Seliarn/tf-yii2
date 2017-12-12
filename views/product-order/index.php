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
			'client',
			// 'product_order_status_id',
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
