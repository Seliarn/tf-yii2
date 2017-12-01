<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\CashFlowStatementGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cash Flow Statement Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-statement-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cash Flow Statement Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'title',
            'created',
            'updated',
            // 'status',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
