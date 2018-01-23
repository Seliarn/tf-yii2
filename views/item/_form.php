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
		echo $model->getAttributeLabel('created') . ' ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>';
		echo $model->getAttributeLabel('updated') . ' ' . Yii::$app->formatter->asDate($model->updated, 'long');
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
	echo $form->field($model, 'state')->dropDownList([
		$model::STATE_NEW => "новый"
	]);
	echo $form->field($model, 'note')->textarea(['row' => 3]);

	echo Html::img($model->imagePath, ['alt' => $model->title, 'height' => 400]);
	echo $form->field($uploadImage, 'imageFile')->fileInput();

	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
