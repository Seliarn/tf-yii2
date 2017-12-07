<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\BankStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Statements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-statement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank Statement', ['create'], ['class' => 'btn btn-success']) ?>
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
            'account_id',
            // 'amount',
            // 'amount_vat',
            // 'vat',
            // 'author_id',
            // 'created',
            // 'updated',
            // 'status',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
