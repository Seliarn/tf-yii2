<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClientContractor */

$this->title = 'Create Client Contractor';
$this->params['breadcrumbs'][] = ['label' => 'Client Contractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-contractor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
