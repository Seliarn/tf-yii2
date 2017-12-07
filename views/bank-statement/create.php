<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BankStatement */

$this->title = 'Create Bank Statement';
$this->params['breadcrumbs'][] = ['label' => 'Bank Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-statement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
