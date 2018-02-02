<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "warehouse-items-form">

	<?php
	if (empty($warehouse)) {
		echo '<div class="alert alert-error fade in">Нет доступных складов. <a href="/' . \app\models\Warehouse::$titles['link'] . '/create">' . Yii::$app->params['translate']['rus']['btn-create'] . '</a></div>';
	} else {
		if (!$model->isNewRecord) {
			echo '<div class = "model-property-date">' .
				'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
				'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
				'</div>';
		}

		$form = ActiveForm::begin();

		if (!empty($warehouse)) {
			$warehouseItems = ArrayHelper::map($warehouse, 'id', 'title');
			echo $form->field($model, 'warehouse_id')->dropDownList($warehouseItems, ['prompt' => $warehouse[0]::$titles['rus']['prompt']])->label($model->attributeLabels('warehouse_id'));
		}

		if (!empty($items)) {
			$itemsArray = ArrayHelper::map($items, 'id', 'title');
			//		$itemsArray = ArrayHelper::toArray($items, ['app\models\Item' => ['title']]);
			//		var_dump($itemsArray);
			echo $form->field($model, 'item_id')->dropDownList($itemsArray, ['prompt' => $items[0]::$titles['rus']['prompt']])->label($model->attributeLabels('item_id'));
			/*
			 * https://pro-cod.ru/autocomplete-v-yii-2-0-uchimsya-ispolzovat.html
			 * https://stackoverflow.com/questions/28385855/yii2-jui-auto-complete-widget-how-to
					echo $form->field($model, 'item_id')->widget(
						AutoComplete::className(), [
						'clientOptions' => [
							'source' => $itemsArray,
							'minLength' => '1',
						],
						'options' => [
							'class' => 'form-control'
						]
					]);


				echo AutoComplete::widget([
					'name' => 'country',
					'model' => $items,
					'attribute' => 'title',
					'clientOptions' => [
						'source' => $itemsArray,
						'minLength' => '1',
					],
				]);
			*/
		}


		echo $form->field($model, 'count')->textInput();
		echo $form->field($model, 'state')->hiddenInput(['value' => 1])->label(false);
		echo $form->field($model, 'cost')->textInput();
		echo $form->field($model, 'amount')->textInput();
		echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
		echo $form->field($model, 'note')->textarea(['row' => 3]);
		?>

		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	}
	?>

</div>
