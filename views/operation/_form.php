<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "operation-form">

	<?php $form = ActiveForm::begin();

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);

	echo $form->field($model, 'type')->dropDownList([
		$model::TYPE_INCOME => 'Приходная',
		$model::TYPE_OUTGOING => 'Расходная'
	]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);

	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
