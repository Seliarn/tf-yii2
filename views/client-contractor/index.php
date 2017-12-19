<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ClientContractor;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\ClientContractorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ClientContractor::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "client-contractor-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . ClientContractor::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'title',
			'company',
//			'director',
			'manager',
			'billing_card',
			// 'edrpou_code',
			// 'inn',
			// 'billing_address',
			'email_1:email',
			// 'email_2:email',
			// 'email_3:email',
			// 'alt_emails:email',
			'phone_1',
			// 'phone_2',
			// 'phone_3',
			// 'alt_phones',
			'address',
			// 'note',
			'created',
			'updated',
			'status',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
