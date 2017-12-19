<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OutgoingCashboxOrder */

$this->title = $model::$titles['rus']['main'] . ' № ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "income-cashbox-order-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-update'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?=
		Html::a(Yii::$app->params['translate']['rus']['btn-delete'], ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::$app->params['translate']['rus']['dialog-are-you-sure'],
				'method' => 'post',
			],
		]) ?>
	</p>

	<?=
	DetailView::widget([
		'model' => $model,
		'attributes' => [
//            'id',
			'code',
			[
				'label' => $model->attributeLabels('operation_id'),
				'value' => $model->getOperation()->one()->title
			],
			[
				'label' => $model->attributeLabels('account_id'),
				'value' => $model->getAccount()->one()->title
			],
			[
				'label' => $model->attributeLabels('cash_flow_statement_id'),
				'value' => $model->getCashFlowStatement()->one()->title
			],
			[
				'label' => $model->attributeLabels('subconto_id'),
				'value' => (!$model->getSubconto()->one()) ? '' : $model->getSubconto()->one()->username
			],
			[
				'label' => $model->attributeLabels('contractor_id'),
				'value' => (!$model->getContractor()->one()) ? '' : $model->getContractor()->one()->company
			],
			'amount',
			[
				'label' => $model->attributeLabels('currency_id'),
				'value' => $model->getCurrency()->one()->title
			],
			'note:ntext',
			'date:date',
			'created:date',
			'updated:date',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
		],
	]) ?>

</div>
