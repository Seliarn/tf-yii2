<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php 
    $form = ActiveForm::begin();

    echo $form->field($model, 'title')->textInput(['maxlength' => true]);
    echo $form->field($model, 'phone')->textInput(['maxlength' => true]);
    echo $form->field($model, 'alt_phones')->textInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'alt_emails')->textInput(['maxlength' => true]);
    echo $form->field($model, 'address')->textInput(['maxlength' => true]);
    echo $form->field($model, 'created')->textInput();
    echo $form->field($model, 'updated')->textInput();
    echo $form->field($model, 'status')->textInput();
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
