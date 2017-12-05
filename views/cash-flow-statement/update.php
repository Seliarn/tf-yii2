<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatement */

$this->title = 'Редактировать статью ДДС: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи ДДС', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::$app->params['translate']['rus']['btn-update'];
?>
<div class="cash-flow-statement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
