<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "client-form">

	<?php $form = ActiveForm::begin();
	echo $form->field($model, 'first_name')->textInput(['maxlength' => true]);
	echo $form->field($model, 'last_name')->textInput(['maxlength' => true]);
	echo $form->field($model, 'username')->textInput(['maxlength' => true]);
	echo $form->field($model, 'birthday')->textInput(['type' => 'date-local']);
	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	echo $form->field($model, 'company')->textInput(['maxlength' => true]);
	echo $form->field($model, 'director')->textInput(['maxlength' => true]);
	echo $form->field($model, 'manager')->textInput(['maxlength' => true]);
	echo $form->field($model, 'billing_card')->textInput(['maxlength' => true]);
	echo $form->field($model, 'edrpou_code')->textInput(['maxlength' => true]);
	echo $form->field($model, 'inn')->textInput(['maxlength' => true]);
	echo $form->field($model, 'billing_address')->textInput(['maxlength' => true]);
	echo $form->field($model, 'email')->textInput(['maxlength' => true]);
	echo $form->field($model, 'alt_emails')->textarea(['row' => 3]);
	echo $form->field($model, 'phone')->textInput(['maxlength' => true]);
	echo $form->field($model, 'alt_phones')->textarea(['row' => 3]);
	echo $form->field($model, 'address')->textarea(['row' => 3]);

	echo $form->field($model, 'is_contractor')->checkbox();
	echo $form->field($model, 'is_customer')->checkbox();
	
	echo $form->field($model, 'note')->textarea(['row' => 3]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
