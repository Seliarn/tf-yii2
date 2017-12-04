<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeCashboxOrder */

$this->title = 'Создать приходный кассовый ордер';
$this->params['breadcrumbs'][] = ['label' => 'Приходные кассовые ордеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-cashbox-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
