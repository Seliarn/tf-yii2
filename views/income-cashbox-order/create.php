<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

$this->title = Yii::$app->params['translate']['rus']['btn-create'] . ' ' . $model::$titles['rus']['main'];
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "income-cashbox-order-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?=
	$this->render('_form', [
		'model' => $model,
		'operations' => $operations,
		'accounts' => $accounts,
		'accountBooks' => $accountBooks,
		'cashFlowStatements' => $cashFlowStatements,
		'employers' => $employers,
		'contractors' => $contractors,
		'currency' => $currency,
	]) ?>

</div>
