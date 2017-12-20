<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WarehouseItems */

$this->title = 'Create Warehouse Items';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
