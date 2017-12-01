<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffEmployee */

$this->title = 'Create Staff Employee';
$this->params['breadcrumbs'][] = ['label' => 'Staff Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
