<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutgoingCashboxOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "outgoing-cashbox-order-form">

	<?php
	if (empty($operations)) {
		echo '<div class="alert alert-error fade in">Нет доступных операций. <a href="/operation/create">Создать</a></div>';
	} else if (empty($accounts)) {
		echo '<div class="alert alert-error fade in">Нет доступных счетов. <a href="/account/create">Создать</a></div>';
	} else if (empty($cashFlowStatements)) {
		echo '<div class="alert alert-error fade in">Нет доступных статей ДДС. <a href="/cash-flow-statement/create">Создать</a></div>';
	} else if (empty($employers)) {
		echo '<div class="alert alert-error fade in">Нет доступных сотрудников. <a href="/staff-employee/create">Создать</a></div>';
	} else {

		$form = ActiveForm::begin();

		echo $form->field($model, 'code')->textInput(['maxlength' => true]);

		$operationItems = ArrayHelper::map($operations, 'id', 'title');
		echo $form->field($model, 'operation_id')->dropDownList($operationItems, ['prompt' => $model->attributeLabels('operation_id')]);

		$accountItems = ArrayHelper::map($accounts, 'id', 'title');
		echo $form->field($model, 'account_id')->dropDownList($accountItems, ['prompt' => $model->attributeLabels('account_id')]);


		$cfsItems = ArrayHelper::map($cashFlowStatements, 'id', 'title');
		echo $form->field($model, 'cash_flow_statement_id')->dropDownList($cfsItems, ['prompt' => $model->attributeLabels('cash_flow_statement_id')]);


		echo $form->field($model, 'note')->textarea(['rows' => 6]);

		$employerItems = ArrayHelper::map($employers, 'id', 'username');
		echo $form->field($model, 'subcount_id')->dropDownList($employerItems, ['prompt' => $model->attributeLabels('subcount_id')]);

		echo $form->field($model, 'amount')->textInput();
		echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);

		?>

		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	} ?>

</div>
