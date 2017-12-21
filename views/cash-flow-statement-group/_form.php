<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatementGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "cash-flow-statement-group-form">

	<?php $form = ActiveForm::begin();

	echo $form->field($model, 'id')->textInput();

	$groupItems = ArrayHelper::map($cfsGroup, 'id', 'title');
	echo $form->field($model, 'parent_id')->dropDownList($groupItems, ['prompt' => $model->attributeLabels('parent_id')]);

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);

	echo $form->field($model, 'created')->textInput();

	echo $form->field($model, 'updated')->textInput();

	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);;

	echo $form->field($model, 'note')->textarea(['row' => 3]);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
