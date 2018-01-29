<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Product;
use app\models\ProductGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Product::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "product-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a(ProductGroup::$titles['rus']['plural'], [ProductGroup::$titles['link'] . '/index'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'id',
			[
				'attribute' => 'group_id',
				'label' => Product::$labels['group_id'],
				'content' => function ($model) {
						$data = $model->getGroup()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'title',
			[
				'attribute' => 'status',
				'label' => Product::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
