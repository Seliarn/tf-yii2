<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "income-cashbox-order-form">

	<?php
	if (empty($operations)) {
		echo '<div class="alert alert-error fade in">Нет доступных операций. <a href="/operation/create">Создать</a></div>';
	} else if (empty($accounts)) {
		echo '<div class="alert alert-error fade in">Нет доступных счетов. <a href="/account/create">Создать</a></div>';
	} else if (empty($cashFlowStatements)) {
		echo '<div class="alert alert-error fade in">Нет доступных статей ДДС. <a href="/cash-flow-statement/create">Создать</a></div>';
	} else if (empty($employers)) {
		echo '<div class="alert alert-error fade in">Нет доступных сотрудников. <a href="/staff-employee/create">Создать</a></div>';
	} else if (empty($contractors)) {
		echo '<div class="alert alert-error fade in">Нет доступных контрагентов. <a href="/client-contractor/create">Создать</a></div>';
	} else if (empty($currency)) {
		echo '<div class="alert alert-error fade in">Нет доступных валют. <a href="/currency/create">Создать</a></div>';
	} else {

		$form = ActiveForm::begin();

		echo $form->field($model, 'code')->textInput(['maxlength' => true]);

		$operationItems = ArrayHelper::map($operations, 'id', 'title');
		echo $form->field($model, 'operation_id')->dropDownList($operationItems, ['prompt' => $model->attributeLabels('operation_id')]);
		echo $form->field($model, 'payment_type')->dropDownList([
			$model::PAYMENT_TYPE_PAY => "Оплата",
			$model::PAYMENT_TYPE_RETURN => "Возврат"
		]);

		$accountItems = ArrayHelper::map($accounts, 'id', 'title');
		echo $form->field($model, 'account_id')->dropDownList($accountItems);

		$cfsItems = ArrayHelper::map($cashFlowStatements, 'id', 'title');
		echo $form->field($model, 'cash_flow_statement_id')->dropDownList($cfsItems);


		$employerItems = ArrayHelper::map($employers, 'id', 'username');
		echo $form->field($model, 'subconto_id')->dropDownList($employerItems);

		$contractorItems = ArrayHelper::map($contractors, 'id', 'company');
		echo $form->field($model, 'contractor_id')->dropDownList($contractorItems);

		echo $form->field($model, 'amount')->textInput();

		$currencyItems = ArrayHelper::map($currency, 'id', 'title');
		echo $form->field($model, 'currency_id')->dropDownList($currencyItems);

		echo $form->field($model, 'note')->textarea(['rows' => 6]);
		echo $form->field($model, 'status')->dropDownList([
			$model::STATUS_ACTIVE => "Провести",
			$model::STATUS_DRAFT => "В черновик"
		]);

		?>

		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	} ?>

</div>
