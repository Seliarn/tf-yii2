<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Account;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Supply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "supply-form">

	<?php
	if (empty($warehouse)) {
		echo '<div class="alert alert-error fade in">Нет доступных складов. <a href="/warehouse/create">Создать</a></div>';
	} else if (empty($contractors)) {
		echo '<div class="alert alert-error fade in">Нет доступных поставщиков. <a href="/client/create">Создать</a></div>';
	} else {

		if (!$model->isNewRecord) {
			echo '<div class = "model-property-date">' .
				'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
				'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
				'</div>';
		}

		$form = ActiveForm::begin([
			'id' => 'supply-item-form'
		]);

		echo $form->field($model, 'date')->textInput(['type' => 'datetime-local']);

		if (!empty($accounts)) {
			$accountItems = ArrayHelper::map($accounts, 'id', 'title');
			echo $form->field($model, 'account_id')->dropDownList($accountItems);
		} else {
			echo '<div class="alert alert-warning fade in">Нет доступных счетов. <a href="/' . Account::$titles['link'] . '/create">Создать</a></div>';
		}

		$warehouseItems = ArrayHelper::map($warehouse, 'id', 'title');
		echo $form->field($model, 'warehouse_id')->dropDownList($warehouseItems, ['prompt' => $warehouse[0]::$titles['rus']['prompt']])->label($model->attributeLabels('warehouse_id'));

		$contractorItems = ArrayHelper::map($contractors, 'id', 'company');
		echo $form->field($model, 'contractor_id')->dropDownList($contractorItems, ['prompt' => $model->attributeLabels('contractor_id')]);

		echo $form->field($model, 'note')->textarea(['row' => 3]);

		?>
		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
		<?php ActiveForm::end();
	}
	?>

</div>
