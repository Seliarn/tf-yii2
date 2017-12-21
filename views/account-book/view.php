<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountBook */

$this->title = $model::$titles['rus']['main'] . ': ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?php
		echo Html::a(Yii::$app->params['translate']['rus']['btn-back-to-list'], ['index'], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-update'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-primary']);
		echo Html::a(Yii::$app->params['translate']['rus']['btn-delete'], ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::$app->params['translate']['rus']['dialog-are-you-sure'],
				'method' => 'post',
			],
		]);
		?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'title',
			[
				'label' => $model->attributeLabels('subconto_model_id'),
				'value' => (!$model->getSubcontoModel()->one()) ? '' : $model->getSubcontoModel()->one()->title
			],
            'created:date',
            'updated:date',
            'note',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
        ],
    ]) ?>

</div>
