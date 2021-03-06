<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "product-form">
	<?php

	if (!$model->isNewRecord) {
		echo '<div class = "model-property-date">' .
			'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
			'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
			'</div>';
	}

	$form = ActiveForm::begin();

	if (!empty($productGroups)) {
		$groupItems = ArrayHelper::map($productGroups, 'id', 'title');
		echo $form->field($model, 'group_id')->dropDownList($groupItems, ['prompt' => $productGroups[0]::$titles['rus']['prompt']])->label($model->attributeLabels('group_id'));
	}

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	echo $form->field($model, 'note')->textarea(['row' => 3]);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
