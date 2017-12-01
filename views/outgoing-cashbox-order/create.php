<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OutgoingCashboxOrder */

$this->title = 'Create Outgoing Cashbox Order';
$this->params['breadcrumbs'][] = ['label' => 'Outgoing Cashbox Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outgoing-cashbox-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
