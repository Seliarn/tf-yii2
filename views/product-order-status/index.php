<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProductOrderStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ProductOrderStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ProductOrderStatus::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "product-order-status-index">

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
			'title',
			'created:datetime',
			'updated:datetime',
			[
				'attribute' => 'status',
				'label' => ProductOrderStatus::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
