<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubcontoModel */

$this->title = 'Create Subconto Model';
$this->params['breadcrumbs'][] = ['label' => 'Subconto Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subconto-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
