<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "product-order-form">

	<?php
	$form = ActiveForm::begin();

	echo $form->field($model, 'client')->textInput(['maxlength' => true]);
	//	echo $form->field($model, 'product_order_status_id')->textInput();
	echo $form->field($model, 'note')->textInput(['maxlength' => true]);
	echo $form->field($model, 'client_note')->textInput(['maxlength' => true]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
