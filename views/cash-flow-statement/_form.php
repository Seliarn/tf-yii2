<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "cash-flow-statement-form">

	<?php $form = ActiveForm::begin();

	$groupItems = ArrayHelper::map($cfsGroup, 'id', 'title');
	echo $form->field($model, 'group_id')->dropDownList($groupItems, ['prompt' => $model->attributeLabels('group_id')]);

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);
	echo $form->field($model, 'note')->textarea(['row' => 3]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
