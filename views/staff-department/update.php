<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */

$this->title = Yii::$app->params['translate']['rus']['btn-update'] . ' ' . $model::$titles['rus']['main'] . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::$app->params['translate']['rus']['btn-update'];
?>
<div class = "staff-department-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?php
		echo Html::a(Yii::$app->params['translate']['rus']['btn-back-to-list'], ['index'], ['class' => 'btn btn-primary']);
		?>
	</p>
	<?=
	$this->render('_form', [
		'model' => $model,
		'parentDepartment' => $parentDepartment,
		'office' => $office,
	]) ?>

</div>
