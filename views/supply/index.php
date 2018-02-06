<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Supply;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\SupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Supply::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "supply-index">

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
			'date:datetime',
			[
				'attribute' => 'contractor_id',
				'label' => Supply::$labels['contractor_id'],
				'content' => function ($model) {
						$data = $model->getContractor()->one();
						return (!$data) ? false : $data->company;
					}
			],
			[
				'attribute' => 'warehouse_id',
				'label' => Supply::$labels['warehouse_id'],
				'content' => function ($model) {
						$data = $model->getWarehouse()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'account_id',
				'label' => Supply::$labels['account_id'],
				'content' => function ($model) {
						$data = $model->getAccount()->one();
						return (!$data) ? false : $data->title;
					}
			],
			//'note',
			'created:datetime',
			'updated:datetime',
			[
				'attribute' => 'status',
				'label' => Supply::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
