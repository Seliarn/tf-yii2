<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $currency app\models\Currency */

$this->title = 'Создать новый счет';
$this->params['breadcrumbs'][] = ['label' => 'Счета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'currency' => $currency
    ]) ?>

</div>