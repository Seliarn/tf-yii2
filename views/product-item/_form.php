<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-item-form">

    <?php 
    $form = ActiveForm::begin();
    echo $form->field($model, 'id')->textInput();
    echo $form->field($model, 'product_id')->textInput();
    echo $form->field($model, 'item_id')->textInput();
    echo $form->field($model, 'count')->textInput();
    echo $form->field($model, 'status')->hiddenInput(['value' => $model::STATUS_ACTIVE]);
    echo $form->field($model, 'note')->textarea(['row' => 3]);
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::$app->params['translate']['rus']['btn-create'] : Yii::$app->params['translate']['rus']['btn-update'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
