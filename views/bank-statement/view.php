<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankStatement */

$this->title = $model::$titles['rus']['main'] . ' № ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "bank-statement-view">

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
			'code',
			[
				'label' => $model->attributeLabels('flow_type'),
				'value' => $model->getFlowTypeAlias()
			],
			[
				'label' => $model->attributeLabels('payment_type'),
				'value' => $model->getPaymentTypeAlias()
			],
			[
				'label' => $model->attributeLabels('account_id'),
				'value' => $model->getAccount()->one()->title
			],
			'amount',
			'amount_vat',
			'vat',
			[
				'label' => $model->attributeLabels('author_id'),
				'value' => $model->getAuthor()->one()->username
			],
			'date:datetime',
			'note:ntext',
			'created:datetime',
			'updated:datetime',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
		],
	]) ?>

</div>
