<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php 
    $form = ActiveForm::begin();
    echo $form->field($model, 'title')->textInput(['maxlength' => true]);
    echo $form->field($model, 'group_id')->textInput();
    echo $form->field($model, 'measures')->textInput();
    echo $form->field($model, 'state')->textInput();
    echo $form->field($model, 'status')->textInput();
    echo $form->field($model, 'note')->textarea(['row' => 3]);
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
