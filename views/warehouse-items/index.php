<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\WarehouseItems;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\WarehouseItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = WarehouseItems::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "warehouse-items-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			[
				'attribute' => 'warehouse_id',
				'label' => WarehouseItems::$labels['warehouse_id'],
				'content' => function ($model) {
						$data = $model->getWarehouse()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'item_id',
				'label' => WarehouseItems::$labels['item_id'],
				'content' => function ($model) {
						$data = $model->getItem()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'count',
//            'state',
			// 'cost',
			// 'amount',
			'created:datetime',
			'updated:datetime',
			[
				'attribute' => 'status',
				'label' => WarehouseItems::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
