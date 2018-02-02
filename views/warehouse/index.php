<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Warehouse;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\WarehouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Warehouse::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "warehouse-index">

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
			'phone',
//            'alt_phones',
			'email:email',
			// 'alt_emails:email',
			'address',
			'created:datetime',
			'updated:datetime',
			[
				'attribute' => 'status',
				'label' => Warehouse::$labels['status'],
				'content' => function ($model) {
						return $model->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
