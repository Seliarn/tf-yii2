<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankStatement */

$this->title = 'Update Bank Statement: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-statement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
