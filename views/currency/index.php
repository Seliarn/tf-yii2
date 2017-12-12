<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Currency;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Валюты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "currency-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Добавить валюту', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'code',
			'title',
			'created:date',
			'updated:date',
			[
				'attribute' => 'status',
				'label' => Currency::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],
//			'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
