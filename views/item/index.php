<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Item;
use app\models\ItemGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Item::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "item-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a(ItemGroup::$titles['rus']['plural'], [ItemGroup::$titles['link'] . '/index'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'title',
			[
				'attribute' => 'group_id',
				'label' => Item::$labels['group_id'],
				'content' => function ($model) {
						$data = $model->getGroup()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'measures',
				'label' => Item::$labels['measures'],
				'content' => function ($model) {
						return $model->getMeasuresAlias();
					}
			],
			[
				'label' => 'Потери',
				'content' => function ($model) {
						return $model->losses_clear . '% | '
						. $model->losses_clear . '% | '
						. $model->losses_cook . '% | '
						. $model->losses_fry . '% | '
						. $model->losses_stew . '% | '
						. $model->losses_bake . '%';
					}
			],

			/*[
				'attribute' => 'state',
				'label' => Item::$labels['state'],
				'content' => function ($model) {
						return $model->getStateAlias();
					}
			],
			*/
			'weight',
			// 'created',
			// 'updated',
			[
				'attribute' => 'status',
				'label' => Item::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note:ntext',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
