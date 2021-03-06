<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\SubcontoModel;

/* @var $this yii\web\View */
/* @var $model app\models\AccountBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "account-book-form">

	<?php

	if (!$model->isNewRecord) {
		echo '<div class = "model-property-date">' .
			'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
			'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
			'</div>';
	}
	
	$form = ActiveForm::begin();

	echo $form->field($model, 'code')->textInput();

	echo $form->field($model, 'title')->textInput(['maxlength' => true]);

	if (!empty($subcontoModels)) {
		$subcontoModelItems = ArrayHelper::map($subcontoModels, 'id', 'title');
		echo $form->field($model, 'subconto_model_id')->dropDownList($subcontoModelItems, ['prompt' => $model->attributeLabels('subconto_model_id')]);
	} else {
		echo '<div class="alert alert-warning fade in">Нет доступных субконто. <a href="/' . SubcontoModel::$titles['link'] . '/create">Создать</a></div>';
	}

	echo $form->field($model, 'note')->textarea(['row' => 3]);
	echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE])->label(false);
	?>

	<div class = "form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
