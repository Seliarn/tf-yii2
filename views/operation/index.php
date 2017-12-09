<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Operation;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\OperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Operation::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "operation-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . Operation::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'title',
			'created:date',
			'updated:date',
			[
				'attribute' => 'type',
				'label' => Operation::$labels['type'],
				'content' => function ($data) {
						return $data->getOperationTypeAlias();
					}
			],
			[
				'attribute' => 'status',
				'label' => Operation::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
