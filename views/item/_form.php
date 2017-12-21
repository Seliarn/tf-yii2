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
	$form = ActiveForm::begin();
	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	if (!empty($itemGroups)) {
		$groupItems = ArrayHelper::map($itemGroups, 'id', 'title');
		echo $form->field($model, 'group_id')->dropDownList($groupItems, ['prompt' => $model->attributeLabels('group_id')]);
	}
	echo $form->field($model, 'measures')->dropDownList([
		$model::MEASURES_GRAM => "грамм",
		$model::MEASURES_LITER => "литр",
		$model::MEASURES_PIECE => "штука"
	]);
	echo $form->field($model, 'state')->dropDownList([
		$model::STATE_NEW => "новый"
	]);
	echo $form->field($model, 'note')->textarea(['row' => 3]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
