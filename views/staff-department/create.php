<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */

$this->title = 'Create Staff Department';
$this->params['breadcrumbs'][] = ['label' => 'Staff Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
