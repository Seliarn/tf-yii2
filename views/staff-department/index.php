<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\StaffDepartment;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\StaffDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = StaffDepartment::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . StaffDepartment::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
			[
				'attribute' => 'parent_id',
				'label' => StaffDepartment::$labels['parent_id'],
				'content' => function ($data) {
						return $data->getParent()->one()->title;
					}
			],
			[
				'attribute' => 'office_id',
				'label' => StaffDepartment::$labels['office_id'],
				'content' => function ($data) {
						return $data->getOffice()->one()->title;
					}
			],
            'note',
			[
				'attribute' => 'status',
				'label' => StaffDepartment::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
