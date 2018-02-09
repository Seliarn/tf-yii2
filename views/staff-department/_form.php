<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "staff-department-form">

	<?php
	if (empty($office)) {
		echo '<div class="alert alert-error fade in">Нет доступных ' . $model->attributeLabels('office_id') . '. <a href="/office/create">Создать</a></div>';
	} else {
		if (!$model->isNewRecord) {
			echo '<div class = "model-property-date">' .
				'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
				'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
				'</div>';
		}

		$form = ActiveForm::begin();

		echo $form->field($model, 'title')->textInput();
		if ($parentDepartment) {
			$departmentItems = ArrayHelper::map($parentDepartment, 'id', 'title');
			echo $form->field($model, 'parent_id')->dropDownList($departmentItems, ['prompt' => $model->attributeLabels('parent_id')]);
		}

		$officeItems = ArrayHelper::map($office, 'id', 'title');
		echo $form->field($model, 'office_id')->dropDownList($officeItems, ['prompt' => $model->attributeLabels('office_id')]);

		echo $form->field($model, 'note')->textarea(['row' => 3]);
		echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
		?>
		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	}?>

</div>
