<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ItemGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ItemGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ItemGroup::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "item-group-index">

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
				'attribute' => 'parent_id',
				'label' => ItemGroup::$labels['parent_id'],
				'content' => function ($model) {
						$data = $model->getParent()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'status',
				'label' => ItemGroup::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
