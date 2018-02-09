<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SupplyItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "supply-item-form row">

	<?php
	if (empty($items)) {
		echo '<div class="alert alert-error fade in">Нет доступных ингредиентов. <a href="/item/create">Создать</a></div>';
	} else {
		if (!$model->isNewRecord) {
			echo '<div class = "model-property-date">' .
				'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
				'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
				'</div>';
		}
		$form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'supply_id')->textInput()->hiddenInput()->label(false) ?>

		<?php
		if ($items) {
			$itemsArray = ArrayHelper::map($items, 'id', 'title');
			echo $form->field($model, 'item_id')->dropDownList($itemsArray, ['prompt' => $items[0]::$titles['rus']['prompt']])->label($model->attributeLabels('item_id'));
		}
		?>

		<?= $form->field($model, 'count')->textInput() ?>

		<?= $form->field($model, 'cost')->textInput() ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'created')->textInput() ?>

		<?= $form->field($model, 'updated')->textInput() ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<div class = "form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end();
	} ?>

</div>
