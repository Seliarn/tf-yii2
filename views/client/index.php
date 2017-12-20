<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Client;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Client::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'username',
            // 'birthday',
            // 'title',
             'company',
            // 'director',
            // 'manager',
            // 'billing_card',
            // 'edrpou_code',
            // 'inn',
            // 'billing_address',
             'email:email',
            // 'alt_emails',
             'phone',
            // 'alt_phones',
            // 'address',
             'note',
            // 'created',
             'updated',
			[
				'attribute' => 'status',
				'label' => Client::$labels['status'],
				'content' => function ($data) {
						return $data->getStatusAlias();
					}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
