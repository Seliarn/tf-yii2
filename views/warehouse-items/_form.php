<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "warehouse-items-form">

	<?php

	if (!$model->isNewRecord) {
		echo $model->getAttributeLabel('created') . ' ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>';
		echo $model->getAttributeLabel('updated') . ' ' . Yii::$app->formatter->asDate($model->updated, 'long');
	}

	$form = ActiveForm::begin();
	echo $form->field($model, 'warehouse_id')->textInput();
	echo $form->field($model, 'item_id')->textInput();
	echo $form->field($model, 'count')->textInput();
	echo $form->field($model, 'state')->hiddenInput(['value' => 1]);
	echo $form->field($model, 'cost')->textInput();
	echo $form->field($model, 'amount')->textInput();
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	echo $form->field($model, 'note')->textarea(['row' => 3]);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
