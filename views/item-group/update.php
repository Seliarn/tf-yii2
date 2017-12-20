<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemGroup */

$this->title = 'Update Item Group: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Item Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>