<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\StaffEmployee;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\StaffEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = StaffEmployee::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . StaffEmployee::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			'username',
			[
				'attribute' => 'department_id',
				'label' => StaffEmployee::$labels['department_id'],
				'content' => function ($data) {
						return $data->getDepartment()->one()->title;
					}
			],
			[
				'attribute' => 'position_id',
				'label' => StaffEmployee::$labels['position_id'],
				'content' => function ($data) {
						return $data->getPosition()->one()->title;
					}
			],
            // 'password',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             'first_name',
             'last_name',
             'email:email',
             'phone',
            // 'note',
             'hired:date',
			[
				'attribute' => 'status',
				'label' => StaffEmployee::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
