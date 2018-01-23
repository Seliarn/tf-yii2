<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CashFlowStatementGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\CashFlowStatementGroup */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CashFlowStatementGroup::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "cash-flow-statement-group-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . CashFlowStatementGroup::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
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
				'label' => CashFlowStatementGroup::$labels['parent_id'],
				'content' => function ($model) {
						$data = $model->getParent()->one();
						return (!$data) ? false : $data->title;
					}
			],
			'title',
			'created:date',
			'updated:date',
			[
				'attribute' => 'status',
				'label' => CashFlowStatementGroup::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
