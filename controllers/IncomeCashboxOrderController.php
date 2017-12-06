<?php

namespace app\controllers;

use app\models\Account;
use app\models\CashFlowStatement;
use app\models\Operation;
use app\models\StaffEmployee;
use Yii;
use app\models\IncomeCashboxOrder;
use app\controllers\search\IncomeCashboxOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IncomeCashboxOrderController implements the CRUD actions for IncomeCashboxOrder model.
 */
class IncomeCashboxOrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IncomeCashboxOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncomeCashboxOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IncomeCashboxOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IncomeCashboxOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IncomeCashboxOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			$operations = Operation::find()->all();
			$accounts = Account::find()->all();
			$cfs = CashFlowStatement::find()->all();
			$employers = StaffEmployee::find()->all();
			return $this->render('create', [
				'model' => $model,
				'operations' => $operations,
				'accounts' => $accounts,
				'cashFlowStatements' => $cfs,
				'employers' => $employers
			]);
        }
    }

    /**
     * Updates an existing IncomeCashboxOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			$operations = Operation::find()->all();
			$accounts = Account::find()->all();
			$cfs = CashFlowStatement::find()->all();
			$employers = StaffEmployee::find()->all();
            return $this->render('update', [
                'model' => $model,
				'operations' => $operations,
                'accounts' => $accounts,
                'cashFlowStatements' => $cfs,
                'employers' => $employers,
            ]);
        }
    }

    /**
     * Deletes an existing IncomeCashboxOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IncomeCashboxOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IncomeCashboxOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IncomeCashboxOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
