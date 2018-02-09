<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "item-form">

	<?php
	if (!$model->isNewRecord) {
		echo '<div class = "model-property-date">' .
			'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
			'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
			'</div>';
	}

	$form = ActiveForm::begin();
	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	if (!empty($itemGroups)) {
		$groupItems = ArrayHelper::map($itemGroups, 'id', 'title');
		echo $form->field($model, 'group_id')->dropDownList($groupItems, ['prompt' => $itemGroups[0]::$titles['rus']['prompt']])->label($model->attributeLabels('group_id'));
	}
	echo $form->field($model, 'measures')->dropDownList([
		$model::MEASURES_GRAM => "грамм",
		$model::MEASURES_LITER => "литр",
		$model::MEASURES_PIECE => "штука",
		$model::MEASURES_METER => "метр"
	]);

	/*
	echo $form->field($model, 'state')->dropDownList([
		$model::STATE_NEW => "новый"
	]);
	*/

	echo $form->field($model, 'losses_clear')->textInput();
	echo $form->field($model, 'losses_cook')->textInput();
	echo $form->field($model, 'losses_fry')->textInput();
	echo $form->field($model, 'losses_stew')->textInput();
	echo $form->field($model, 'losses_bake')->textInput();
	echo $form->field($model, 'weight')->textInput();

	echo $form->field($model, 'note')->textarea(['row' => 3]);

	if (!empty($model->imagePath)) {
		echo Html::img('/' . $model->imagePath, ['alt' => $model->title, 'height' => 400]);
	}
	echo $form->field($uploadImage, 'imageFile')->fileInput();

	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
