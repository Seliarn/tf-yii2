<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */

$this->title = Yii::$app->params['translate']['rus']['btn-create'];
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "staff-department-create">

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
