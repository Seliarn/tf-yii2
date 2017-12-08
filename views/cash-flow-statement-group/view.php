<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CashFlowStatementGroup */

$this->title = $model::$titles['rus']['main'] . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-statement-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::$app->params['translate']['rus']['btn-update'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::$app->params['translate']['rus']['btn-delete'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::$app->params['translate']['rus']['dialog-are-you-sure'],
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'label' => $model->attributeLabels('parent_id'),
				'value' => $model->getParent()->one()->title
			],
            'title',
            'created:date',
            'updated:date',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
            'note',
        ],
    ]) ?>

</div>
