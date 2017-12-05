<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatementGroup */

$this->title = 'Редактировать группу статей ДДС: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Группы статей ДДС', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::$app->params['translate']['rus']['btn-update'];
?>
<div class="cash-flow-statement-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
