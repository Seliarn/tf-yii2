<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\search\ClientContractorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-contractor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'company') ?>

    <?= $form->field($model, 'director') ?>

    <?= $form->field($model, 'manager') ?>

    <?php // echo $form->field($model, 'billing_card') ?>

    <?php // echo $form->field($model, 'edrpou_code') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'billing_address') ?>

    <?php // echo $form->field($model, 'email_1') ?>

    <?php // echo $form->field($model, 'email_2') ?>

    <?php // echo $form->field($model, 'email_3') ?>

    <?php // echo $form->field($model, 'alt_emails') ?>

    <?php // echo $form->field($model, 'phone_1') ?>

    <?php // echo $form->field($model, 'phone_2') ?>

    <?php // echo $form->field($model, 'phone_3') ?>

    <?php // echo $form->field($model, 'alt_phones') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
