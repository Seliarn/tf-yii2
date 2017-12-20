<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BankStatement;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\BankStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = BankStatement::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "bank-statement-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . BankStatement::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'code',
			[
				'attribute' => 'flow_type',
				'label' => BankStatement::$labels['flow_type'],
				'content' => function ($data) {
						return $data->getFlowTypeAlias();
					}
			],
			[
				'attribute' => 'payment_type',
				'label' => BankStatement::$labels['payment_type'],
				'content' => function ($data) {
						return $data->getPaymentTypeAlias();
					}
			],
			[
				'attribute' => 'account_id',
				'label' => BankStatement::$labels['account_id'],
				'content' => function ($data) {
						return $data->getAccount()->one()->title;
					}
			],
			 'amount',
			// 'amount_vat',
			// 'vat',
			// '',
			[
				'attribute' => 'author_id',
				'label' => BankStatement::$labels['author_id'],
				'content' => function ($data) {
						return $data->getAuthor()->one()->username;
					}
			],
			 'date:datetime',
			[
				'attribute' => 'status',
				'label' => BankStatement::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
