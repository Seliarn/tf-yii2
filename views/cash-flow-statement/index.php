<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CashFlowStatement;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\CashFlowStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CashFlowStatement::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "cash-flow-statement-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . CashFlowStatement::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
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
				'label' => CashFlowStatement::$labels['group_id'],
				'content' => function ($data) {
						return $data->getGroup()->one()->title;
					}
			],
			'title',
			'created:date',
			'updated:date',
			[
				'attribute' => 'status',
				'label' => CashFlowStatement::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
