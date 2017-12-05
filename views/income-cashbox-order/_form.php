<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "income-cashbox-order-form">

	<?php $form = ActiveForm::begin();

	echo $form->field($model, 'code')->textInput(['maxlength' => true]);

	$operationItems = ArrayHelper::map($operations, 'id', 'title');
	echo $form->field($model, 'operation_id')->dropDownList($operationItems, ['prompt' => 'Операция']);

	$accountItems = ArrayHelper::map($accounts, 'id', 'title');
	echo $form->field($model, 'account_id')->dropDownList($accountItems, ['prompt' => 'Счет']);

	$cfsItems = ArrayHelper::map($cfs, 'id', 'title');
	echo $form->field($model, 'cash_flow_statement_id')->dropDownList($accountItems, ['prompt' => 'Статья ДДС']);

	echo $form->field($model, 'note')->textarea(['rows' => 6]);

	$employerItems = ArrayHelper::map($employers, 'id', 'username');
	echo $form->field($model, 'subcount_id')->dropDownList($accountItems, ['prompt' => 'Субконто']);

	echo $form->field($model, 'amount')->textInput();

	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
