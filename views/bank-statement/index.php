<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BankStatement;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\BankStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = IncomeCashboxOrder::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-statement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a(Yii::$app->params['translate']['rus']['btn-create'] . ' ' . IncomeCashboxOrder::$titles['rus']['main'], ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'flow_type',
            'payment_type',
			[
				'attribute' => 'account_id',
				'label' => IncomeCashboxOrder::$labels['account_id'],
				'content' => function ($data) {
						return $data->getAccount()->one()->title;
					}
			],
            // 'amount',
            // 'amount_vat',
            // 'vat',
            // '',
			[
				'attribute' => 'author_id',
				'label' => IncomeCashboxOrder::$labels['author_id'],
				'content' => function ($data) {
						return $data->getAuthor()->one()->username;
					}
			],
            // 'created',
            // 'updated',
            // 'status',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
