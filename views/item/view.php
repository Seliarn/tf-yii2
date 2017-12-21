<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model::$titles['rus']['main'] . ' № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model::$titles['rus']['plural'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "item-view">

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

	<?=
	DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'title',
			[
				'label' => $model->attributeLabels('group_id'),
				'value' => (!$model->getGroup()->one()) ? '' : $model->getGroup()->one()->title
			],
			[
				'label' => $model->attributeLabels('measures'),
				'value' => $model->getMeasuresAlias()
			],
			[
				'label' => $model->attributeLabels('state'),
				'value' => $model->getStateAlias()
			],
			'note',
			[
				'label' => $model->attributeLabels('status'),
				'value' => $model->getStatusAlias()
			],
			'created:datetime',
			'updated:datetime',
		],
	]) ?>

</div>
