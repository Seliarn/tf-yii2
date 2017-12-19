<?php

namespace app\controllers;

use app\models\Account;
use app\models\CashFlowStatement;
use app\models\Operation;
use app\models\StaffEmployee;
use app\models\Currency;
use app\models\ClientContractor;
use Yii;
use app\models\OutgoingCashboxOrder;
use app\controllers\search\OutgoingCashboxOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OutgoingCashboxOrderController implements the CRUD actions for OutgoingCashboxOrder model.
 */
class OutgoingCashboxOrderController extends Controller
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
	 * Lists all OutgoingCashboxOrder models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new OutgoingCashboxOrderSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single OutgoingCashboxOrder model.
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
	 * Creates a new OutgoingCashboxOrder model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new OutgoingCashboxOrder();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$params = array_merge(['model' => $model], $this->_prepareForm());
			return $this->render('create', $params);
		}
	}

	/**
	 * Updates an existing OutgoingCashboxOrder model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {
			$model->updated = time();
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			$params = array_merge(['model' => $model], $this->_prepareForm());
			return $this->render('update', $params);
		}
	}

	/**
	 * Deletes an existing OutgoingCashboxOrder model.
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
	 * Finds the OutgoingCashboxOrder model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return OutgoingCashboxOrder the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = OutgoingCashboxOrder::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	/**
	 * Prepare form.
	 * @return array
	 */
	protected function _prepareForm()
	{
		$operations = Operation::find()->where(['type' => Operation::TYPE_OUTGOING])->all();
		$accounts = Account::find()->all();
		$cfs = CashFlowStatement::find()->all();
		$employers = StaffEmployee::find()->all();
		$contractors = ClientContractor::find()->all();
		$currency = Currency::find()->all();

		return [
			'operations' => $operations,
			'accounts' => $accounts,
			'cashFlowStatements' => $cfs,
			'employers' => $employers,
			'currency' => $currency,
			'contractors' => $contractors,
		];
	}
}
