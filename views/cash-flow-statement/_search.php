<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\search\CashFlowStatementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cash-flow-statement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::$app->params['translate']['rus']['btn-search'], ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::$app->params['translate']['rus']['btn-reset'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
