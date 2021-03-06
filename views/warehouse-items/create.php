<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WarehouseItems */

$this->title = Yii::$app->params['translate']['rus']['btn-create'] . ' ' . $model::$titles['rus']['main'];
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "warehouse-items-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?=
	$this->render('_form', [
		'model' => $model,
		'warehouse' => $warehouse,
		'items' => $items,
	]) ?>

</div>
