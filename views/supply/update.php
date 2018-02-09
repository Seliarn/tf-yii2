<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supply */

$this->title = Yii::$app->params['translate']['rus']['btn-update'] . ' ' . $model::$titles['rus']['main'] . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::$app->params['translate']['rus']['btn-update'];
?>
<div class = "supply-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?=
	$this->render('_form', [
		'model' => $model,
		'contractors' => $contractors,
		'warehouse' => $warehouse,
		'accounts' => $accounts,
		'newSupplyItem' => $newSupplyItem,
		'items' => $items,
		'supplyItems' => $supplyItems,
	]) ?>
	<hr/>
</div>
