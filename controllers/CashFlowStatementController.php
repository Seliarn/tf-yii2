<?php

namespace app\controllers;

use app\models\CashFlowStatementGroup;
use Yii;
use app\models\CashFlowStatement;
use app\controllers\search\CashFlowStatementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CashFlowStatementController implements the CRUD actions for CashFlowStatement model.
 */
class CashFlowStatementController extends Controller
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
	 * Lists all CashFlowStatement models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new CashFlowStatementSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single CashFlowStatement model.
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
	 * Creates a new CashFlowStatement model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new CashFlowStatement();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$cfsGroup = CashFlowStatementGroup::find()->all();
			return $this->render('create', [
				'model' => $model,
				'cfsGroup' => $cfsGroup,
			]);
		}
	}

	/**
	 * Updates an existing CashFlowStatement model.
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
			$cfsGroup = CashFlowStatementGroup::find()->all();
			return $this->render('update', [
				'model' => $model,
				'cfsGroup' => $cfsGroup,
			]);
		}
	}

	/**
	 * Deletes an existing CashFlowStatement model.
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
	 * Finds the CashFlowStatement model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CashFlowStatement the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = CashFlowStatement::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
