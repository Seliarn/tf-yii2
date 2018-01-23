<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseItems */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'label' => $model->attributeLabels('warehouse_id'),
				'value' => (!$model->getWarehouse()->one()) ? '' : $model->getWarehouse()->one()->title
			],
			[
				'label' => $model->attributeLabels('item_id'),
				'value' => (!$model->getItem()->one()) ? '' : $model->getItem()->one()->title
			],
            'count',
            'state',
            'cost',
            'amount',
            'created:datetime',
            'updated:datetime',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
            'note',
        ],
    ]) ?>

</div>
