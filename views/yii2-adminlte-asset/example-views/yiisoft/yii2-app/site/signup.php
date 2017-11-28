<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign Up';
?>

<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registration</p>

        <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username')
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username'),'autofocus' => true]) ?>

        <?= $form
            ->field($model, 'email')
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form
            ->field($model, 'password')
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <?= Html::a('To Sign in', Url::to(['site/login']), ['class' => 'btn btn-link btn-block btn-flat', 'name' => 'return-to-signin']) ?>
            </div>
            <div class="col-xs-6">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
