<?php

namespace app\controllers;

use app\models\StaffDepartment;
use app\models\StaffPosition;
use Yii;
use app\models\StaffEmployee;
use app\controllers\search\StaffEmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaffEmployeeController implements the CRUD actions for StaffEmployee model.
 */
class StaffEmployeeController extends Controller
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
	 * Lists all StaffEmployee models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new StaffEmployeeSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single StaffEmployee model.
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
	 * Creates a new StaffEmployee model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new StaffEmployee();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$department = StaffDepartment::find()->all();
			$position = StaffPosition::find()->all();
			return $this->render('update', [
				'model' => $model,
				'department' => $department,
				'position' => $position,
			]);
		}
	}

	/**
	 * Updates an existing StaffEmployee model.
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
			$department = StaffDepartment::find()->all();
			$position = StaffPosition::find()->all();
			return $this->render('update', [
				'model' => $model,
				'department' => $department,
				'position' => $position,
			]);
		}
	}

	/**
	 * Deletes an existing StaffEmployee model.
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
	 * Finds the StaffEmployee model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return StaffEmployee the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = StaffEmployee::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
