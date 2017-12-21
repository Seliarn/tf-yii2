<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AccountBook;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\search\AccountBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AccountBook::$titles['rus']['plural'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-book-index">

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
            'code',
            'title',
            [
                'attribute' => 'subconto_model_id',
                'label' => AccountBook::$labels['subconto_model_id'],
                'content' => function ($model) {
                        $data = $model->getSubcontoModel()->one();
                        return (!$data) ? false : $data->title;
                    }
            ],
            [
                'attribute' => 'status',
                'label' => AccountBook::$labels['status'],
                'content' => function ($data) {
                        return $data->getStatusAlias();
                    }
            ],
            // 'created',
            // 'updated',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
