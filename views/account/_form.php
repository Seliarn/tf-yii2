<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $currency app\models\Currency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "account-form">

	<?php
	if (empty($currency)) {
		echo '<div class="alert alert-error fade in">Нет доступных валют. <a href="/' . \app\models\Currency::$titles['link'] . '/create">Создать</a></div>';
	} else {

		if (!$model->isNewRecord) {
			echo '<div class = "model-property-date">' .
				'<label>' . $model->getAttributeLabel('created') . ':</label> ' . Yii::$app->formatter->asDate($model->created, 'long') . '<br>' .
				'<label>' . $model->getAttributeLabel('updated') . ':</label> ' . Yii::$app->formatter->asDate($model->updated, 'long') .
			'</div>';
		}

		$form = ActiveForm::begin();

		echo $form->field($model, 'title')->textInput(['maxlength' => true]);
		echo $form->field($model, 'description')->textarea(['rows' => 6]);
		$items = ArrayHelper::map($currency, 'id', 'title');
		$params = [
			'prompt' => 'Выберите валюту'
		];
		echo $form->field($model, 'currency_id')->dropDownList($items, $params);

		?>
		<div class = "form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end();
	}
	?>

</div>
