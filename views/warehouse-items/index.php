<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\WarehouseItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'warehouse_id',
            'item_id',
            'count',
            'state',
            // 'cost',
            // 'amount',
            // 'created',
            // 'updated',
            // 'status',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
