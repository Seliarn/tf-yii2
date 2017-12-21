<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "staff-employee-form">

	<?php $form = ActiveForm::begin();

	$departmentItems = ArrayHelper::map($department, 'id', 'title');
	echo $form->field($model, 'department_id')->dropDownList($departmentItems, ['prompt' => $model->attributeLabels('department_id')]);

	$positionItems = ArrayHelper::map($position, 'id', 'title');
	echo $form->field($model, 'position_id')->dropDownList($positionItems, ['prompt' => $model->attributeLabels('position_id')]);

	echo $form->field($model, 'username')->textInput(['maxlength' => true]);

//	echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);

	echo $form->field($model, 'first_name')->textInput(['maxlength' => true]);

	echo $form->field($model, 'last_name')->textInput(['maxlength' => true]);

	echo $form->field($model, 'email')->textInput(['maxlength' => true]);

	echo $form->field($model, 'phone')->textInput(['maxlength' => true]);

	echo $form->field($model, 'note')->textarea(['row' => 3]);

//	echo $form->field($model, 'hired')->();
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
	?>
	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ?  Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
