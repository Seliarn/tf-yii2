<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Account;
use app\models\Warehouse;
use app\models\Client;
use app\models\Item;
use app\models\SupplyItem;

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
	} else if (empty($items)) {
		echo '<div class="alert alert-error fade in">Нет доступных ингредиентов. <a href="/item/create">Создать</a></div>';
	} else {

	if (!$model->isNewRecord) {
		echo '<div class = "model-property-date">' .
			'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
			'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
			'</div>';
	}

	$form = ActiveForm::begin();

	echo $form->field($model, 'date')->textInput(['type' => 'datetime-local']);

	if (!empty($accounts)) {
		$accountItems = ArrayHelper::map($accounts, 'id', 'title');
		echo $form->field($model, 'account_id')->dropDownList($accountItems);
	} else {
		echo '<div class="alert alert-warning fade in">Нет доступных счетов. <a href="/' . Account::$titles['link'] . '/create">Создать</a></div>';
	}

	$warehouseItems = ArrayHelper::map($warehouse, 'id', 'title');
	echo $form->field($model, 'warehouse_id')->dropDownList($warehouseItems, ['prompt' => Warehouse::$titles['rus']['prompt']])->label($model->attributeLabels('warehouse_id'));

	$contractorItems = ArrayHelper::map($contractors, 'id', 'company');
	echo $form->field($model, 'contractor_id')->dropDownList($contractorItems, ['prompt' => $model->attributeLabels('contractor_id')]);
	echo $form->field($model, 'contractor_id')->dropDownList($contractorItems, ['prompt' => "Выберите поставщика"])->label($model->attributeLabels('contractor_id'));

	echo $form->field($model, 'note')->textarea(['row' => 3]);

	?>

	<h3><?= Item::$titles['rus']['plural'] ?></h3>
	<hr/>
	<div class = "supply-item">
		<div class = "supply-item-list">

			<?php
			$itemsArray = ArrayHelper::map($items, 'id', 'title');
			foreach ($supplyItems as $row) {
				?>
				<div class = "supply-item-fields row align-top" data-id = "<?= $row->id ?>">

					<div class = "col-md-4">
						<?= $form->field($row, 'item_id')->dropDownList($itemsArray, ['prompt' => Item::$titles['rus']['prompt'], 'name' => 'item_id[' . $row->id . ']'])->label($row->attributeLabels('item_id')) ?>
					</div>
					<div class = "col-md-1">
						<?= $form->field($row, 'count')->textInput(['name' => 'count[' . $row->id . ']']) ?>
					</div>
					<div class = "col-md-1">
						<?= $form->field($row, 'cost')->textInput(['name' => 'cost[' . $row->id . ']']) ?>
					</div>
					<div class = "col-md-4">
						<?= $form->field($row, 'note')->textarea(['row' => 3, 'name' => 'note[' . $row->id . ']']) ?>
					</div>
					<div class = "form-group col-md-2">
						<a href = "#" class = "supply-item-btn-delete">x</a>
					</div>

				</div>
			<?php
			}
			?>
		</div>
		<button id = "new-supply-item-btn-add" type = "button">Добавить ингредиент</button>

		<hr/>
		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>


		<?php
		ActiveForm::end();
		?>
		<div class = "new-supply-item-fields row align-top hide">

			<div class = "col-md-4">
				<?= $form->field($newSupplyItem, 'item_id')->dropDownList($itemsArray, ['name' => 'new-item_id', 'class' => 'supply-item-input', 'prompt' => $items[0]::$titles['rus']['prompt']])->label($newSupplyItem->attributeLabels('item_id')) ?>
			</div>
			<div class = "col-md-1">
				<?= $form->field($newSupplyItem, 'count')->textInput(['name' => 'new-count', 'class' => 'supply-item-input']) ?>
			</div>
			<div class = "col-md-1">
				<?= $form->field($newSupplyItem, 'cost')->textInput(['name' => 'new-cost', 'class' => 'supply-item-input']) ?>
			</div>
			<div class = "col-md-4">
				<?= $form->field($newSupplyItem, 'note')->textarea(['name' => 'new-note', 'row' => 3, 'class' => 'supply-item-input']) ?>
			</div>
		</div>
		<?php
		$this->registerJsFile('@web/js/views/supply/update.js', ['depends' => 'yii\web\JqueryAsset']);
		}
		?>

	</div>
</div>