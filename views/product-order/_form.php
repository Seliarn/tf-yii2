<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProductOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "product-order-form">

	<?php
	if (empty($customers)) {
		echo '<div class="alert alert-error fade in">Нет доступных клиентов. <a href="/client-customer/create">Создать</a></div>';
	} else {
		$form = ActiveForm::begin();

		$customerItems = ArrayHelper::map($customers, 'id', 'email_1');
		echo $form->field($model, 'customer_id')->dropDownList($customerItems, ['prompt' => $model->attributeLabels('customer_id')]);

		//	echo $form->field($model, 'product_order_status_id')->textInput();
		echo $form->field($model, 'note')->textarea(['row' => 3]);
		echo $form->field($model, 'client_note')->textInput(['maxlength' => true]);
		echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
		?>

		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php
		ActiveForm::end();
	} ?>

</div>
