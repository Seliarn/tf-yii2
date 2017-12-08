<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

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
			'note:ntext',
			[
				'label' => $model->attributeLabels('subcount_id'),
				'value' => $model->getSubcount()->one()->username
			],
			'amount',
			'created:date',
			'updated:date',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
		],
	]) ?>

</div>
