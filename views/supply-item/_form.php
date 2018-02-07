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
		$form = ActiveForm::begin(); ?>
		<div class = "col-md-4">
			<?= $form->field($model, 'supply_id')->textInput()->hiddenInput()->label(false) ?>

			<?php
			$itemsArray = ArrayHelper::map($items, 'id', 'title');
			echo $form->field($model, 'item_id')->dropDownList($itemsArray, ['prompt' => $items[0]::$titles['rus']['prompt']])->label($model->attributeLabels('item_id'));
			?>
		</div>
		<div class = "col-md-2">
			<?= $form->field($model, 'count')->textInput() ?>
		</div>
		<div class = "col-md-2">
			<?= $form->field($model, 'cost')->textInput() ?>
		</div>
		<div class = "col-md-2">
			<?= $form->field($model, 'note')->textarea(['row' => 3]) ?>
		</div>
		<div class = "form-group col-md-2">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	} ?>

</div>
