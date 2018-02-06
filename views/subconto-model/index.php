<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SubcontoModel;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\SubcontoModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = SubcontoModel::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "subconto-model-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Subconto Model', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'class_name',
			'title',
			'created:datetime',
			'updated:datetime',
			[
				'attribute' => 'status',
				'label' => SubcontoModel::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
