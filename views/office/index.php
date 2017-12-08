<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Office;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Office::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . Office::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'address:ntext',
            'email:email',
            'phone',
            // 'note',
			[
				'attribute' => 'status',
				'label' => Office::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
