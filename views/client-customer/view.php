<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\GridView;
use app\models\ProductOrder;

/* @var $this yii\web\View */
/* @var $model app\models\ClientCustomer */

$this->title = $model::$titles['rus']['main'] . '№ ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "client-customer-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?php
		echo Html::a(Yii::$app->params['translate']['rus']['btn-back-to-list'], ['index'], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-update'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-delete'], ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::$app->params['translate']['rus']['dialog-are-you-sure'],
				'method' => 'post',
			],
		]);
		?>
	</p>

	<?=
	DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'username',
			'first_name',
			'last_name',
			'billing_card',
			'email_1:email',
			'email_2:email',
			'email_3:email',
			'alt_emails',
			'phone_1',
			'phone_2',
			'phone_3',
			'alt_phones',
			'address',
			'birthday',
			'note',
			'created:date',
			'updated:date',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
		],
	]) ?>
	<?=
	GridView::widget([
		'dataProvider' => $customerOrders,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			[
				'attribute' => 'customer_id',
				'label' => ProductOrder::$labels['customer_id'],
				'content' => function ($model) {
						$data = $model->getCustomer()->one();
						return (!$data) ? false : $data->email_1;
					}
			],
			'updated:date',
			[
				'attribute' => 'status',
				'label' => ProductOrder::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	])?>
</div>
