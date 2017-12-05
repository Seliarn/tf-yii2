<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatementGroup */

$this->title = 'Создать группу статей ДДС';
$this->params['breadcrumbs'][] = ['label' => 'Группы статей ДДС', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-statement-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>