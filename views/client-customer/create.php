<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClientCustomer */

$this->title = 'Create Client Customer';
$this->params['breadcrumbs'][] = ['label' => 'Client Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
