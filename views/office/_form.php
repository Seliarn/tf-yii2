<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "office-form">

	<?php $form = ActiveForm::begin();

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);

	echo $form->field($model, 'address')->textarea(['rows' => 6]);

	echo $form->field($model, 'email')->textInput(['maxlength' => true]);

	echo $form->field($model, 'phone')->textInput(['maxlength' => true]);

	echo $form->field($model, 'note')->textInput(['maxlength' => true]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
