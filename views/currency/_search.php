<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\search\CurrencySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "currency-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

	<?php
	echo $form->field($model, 'code');
	echo $form->field($model, 'title');
//	echo $form->field($model, 'created');
//	echo $form->field($model, 'updated');
	// echo $form->field($model, 'status')
	// echo $form->field($model, 'note')
	?>

	<div class = "form-group">
		<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
