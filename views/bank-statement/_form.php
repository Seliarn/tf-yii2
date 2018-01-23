<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\BankStatement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "bank-statement-form">

	<?php
	if (empty($accounts)) {
		echo '<div class="alert alert-error fade in">Нет доступных счетов. <a href="/account/create">Создать</a></div>';
	} else if (empty($employers)) {
		echo '<div class="alert alert-error fade in">Нет доступных сотрудников. <a href="/staff-employee/create">Создать</a></div>';
	} else {
		if (!$model->isNewRecord) {
			echo $model->getAttributeLabel('created') . ' ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>';
			echo $model->getAttributeLabel('updated') . ' ' . Yii::$app->formatter->asDate($model->updated, 'long');
		}

		$form = ActiveForm::begin();

		echo $form->field($model, 'code')->textInput(['maxlength' => true]);

		echo $form->field($model, 'flow_type')->dropDownList([
			'1' => 'Поступление',
			'2' => 'Выплата'
		]);

		echo $form->field($model, 'payment_type')->dropDownList([
			'1' => 'Оплата',
			'2' => 'Возврат'
		]);

		$accountItems = ArrayHelper::map($accounts, 'id', 'title');
		echo $form->field($model, 'account_id')->dropDownList($accountItems, ['prompt' => $model->attributeLabels('account_id')]);

		echo $form->field($model, 'amount')->textInput();

		echo $form->field($model, 'amount_vat')->textInput();

		echo $form->field($model, 'vat')->textInput();

		$employerItems = ArrayHelper::map($employers, 'id', 'username');
		echo $form->field($model, 'author_id')->dropDownList($employerItems, ['prompt' => $model->attributeLabels('author_id')]);
		echo $form->field($model, 'date')->textInput(['type' => 'datetime-local']);

		echo $form->field($model, 'note')->textarea(['row' => 3]);
		echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	}
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
