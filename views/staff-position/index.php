<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\StaffPosition;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\StaffPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = StaffPosition::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . StaffPosition::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
			[
				'attribute' => 'status',
				'label' => StaffPosition::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
