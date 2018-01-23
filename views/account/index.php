<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Account::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "account-index">

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
			'description:ntext',
			[
				'attribute' => 'currency_id',
				'label' => Account::$labels['currency_id'],
				'content' => function ($data) {
						return $data->getCurrency()->one()->title;
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
;