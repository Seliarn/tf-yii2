<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Supply */

$this->title = Yii::$app->params['translate']['rus']['btn-create'] . ' ' . $model::$titles['rus']['main'];
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "supply-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?=
	$this->render('_form', [
		'model' => $model,
		'contractors' => $contractors,
		'warehouse' => $warehouse,
		'accounts' => $accounts
	]) ?>

</div>
