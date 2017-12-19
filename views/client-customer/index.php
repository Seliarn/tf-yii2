<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ClientCustomer;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ClientCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ClientCustomer::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "client-customer-index">

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
			'username',
			'first_name',
			'last_name',
			'billing_card',
			'email_1:email',
			// 'email_2:email',
			// 'email_3:email',
			// 'alt_emails',
			'phone_1',
			// 'phone_2',
			// 'phone_3',
			// 'alt_phones',
			'address',
			'birthday',
			// 'note',
			'created:date',
			'updated:date',
			[
				'attribute' => 'status',
				'label' => ClientCustomer::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
