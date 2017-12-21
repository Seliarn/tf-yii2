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
				'label' => ItemGroup::$labels['group_id'],
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
				'attribute' => 'state',
				'label' => Item::$labels['state'],
				'content' => function ($model) {
						return $model->getStateAlias();
					}
			],
			'',
			// 'created',
			// 'updated',
			[
				'attribute' => 'status',
				'label' => Item::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
