<?php

use yii\helpers\Html;
use app\models\ProductGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ProductGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ProductGroup::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "product-group-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Product Group', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			[
				'attribute' => 'parent_id',
				'label' => ProductGroup::$labels['parent_id'],
				'content' => function ($model) {
						$data = $model->getParent()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'title',
			[
				'attribute' => 'status',
				'label' => ProductGroup::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			'created:dateitme',
			'updated:dateitme',
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
