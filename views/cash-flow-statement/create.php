<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatement */

$this->title = 'Создать статью ДДС';
$this->params['breadcrumbs'][] = ['label' => 'Статьи ДДС', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-statement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
