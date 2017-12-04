<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Currency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "currency-form">
	<?php
	if (!$model->isNewRecord) {
		echo $model->getAttributeLabel('created') . ' ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>';
		echo $model->getAttributeLabel('updated') . ' ' . Yii::$app->formatter->asDate($model->updated, 'long');
	}
	$form = ActiveForm::begin();

	echo $form->field($model, 'code')->textInput();
	echo $form->field($model, 'title')->textInput();
	echo $form->field($model, 'status')->dropDownList([
		'1' => 'Активный',
		'2' => 'Удален'
	]);
	echo $form->field($model, 'note')->textInput(['maxlength' => true]);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php
	ActiveForm::end();
	?>

</div>
