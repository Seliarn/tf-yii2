<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientContractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "client-contractor-form">

	<?php $form = ActiveForm::begin();

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	echo $form->field($model, 'company')->textInput(['maxlength' => true]);
	echo $form->field($model, 'director')->textInput(['maxlength' => true]);
	echo $form->field($model, 'manager')->textInput(['maxlength' => true]);
	echo $form->field($model, 'billing_card')->textInput(['maxlength' => true]);
	echo $form->field($model, 'edrpou_code')->textInput(['maxlength' => true]);
	echo $form->field($model, 'inn')->textInput(['maxlength' => true]);
	echo $form->field($model, 'billing_address')->textInput(['maxlength' => true]);
	echo $form->field($model, 'email_1')->textInput(['maxlength' => true]);
	echo $form->field($model, 'email_2')->textInput(['maxlength' => true]);
	echo $form->field($model, 'email_3')->textInput(['maxlength' => true]);
	echo $form->field($model, 'alt_emails')->textarea(['rows' => 3]);
	echo $form->field($model, 'phone_1')->textInput(['maxlength' => true]);
	echo $form->field($model, 'phone_2')->textInput(['maxlength' => true]);
	echo $form->field($model, 'phone_3')->textInput(['maxlength' => true]);
	echo $form->field($model, 'alt_phones')->textarea(['rows' => 3]);
	echo $form->field($model, 'address')->textInput(['maxlength' => true]);
	echo $form->field($model, 'note')->textarea(['rows' => 3]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
