<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Item;
use app\models\SupplyItem;

/* @var $this yii\web\View */
/* @var $model app\models\Supply */

$this->title = $model::$titles['rus']['main'] . ' № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "supply-view">

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
			'date:datetime',
			[
				'label' => $model->attributeLabels('contractor_id'),
				'value' => (!$contractor = $model->getContractor()->one()) ? '' : $contractor->company
			],
			[
				'label' => $model->attributeLabels('warehouse_id'),
				'value' => (!$warehouse = $model->getWarehouse()->one()) ? '' : $warehouse->title
			],
			[
				'label' => $model->attributeLabels('account_id'),
				'value' => (!$account = $model->getAccount()->one()) ? '' : $account->title
			],
			'note',
			'created:datetime',
			'updated:datetime',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
		],
	]) ?>
	<hr>
	<?=
	GridView::widget([
		'dataProvider' => $supplyItemsDataProvider,
		'showFooter' => TRUE,
		'columns' => [
			'id',
			[
				'attribute' => 'item_id',
				'label' => Item::$labels['title'],
				'content' => function ($model) {
						$data = $model->getItem()->one();
						return (!$data) ? false : $data->title;
					}
			],
			[
				'attribute' => 'measures',
				'label' => SupplyItem::$labels['measures'],
				'content' => function ($model) {
						return Item::$measuresAlias[$model->measures];
					}
			],
			'count',
			'cost',
			[
				'attribute' => 'cost',
				'footer' => $totalAmount
			],
			'note',
			//'created',
			//'updated',
			//'status',
		],
	])?>

</div>
