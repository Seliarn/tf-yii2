<?php

namespace app\controllers;

use Yii;
use app\models\Supply;
use app\models\SupplyItem;
use app\models\Account;
use app\models\Warehouse;
use app\models\Client;
use app\models\Item;
use app\controllers\search\SupplySearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupplyController implements the CRUD actions for Supply model.
 */
class SupplyController extends Controller
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
	 * Lists all Supply models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new SupplySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Supply model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);

		$itemsDataProvider = new ActiveDataProvider([
			'query' => SupplyItem::find()->where(['supply_id' => $model->id])->orderBy('id DESC')
		]);


		return $this->render('view', [
			'model' => $model,
			'supplyItemsDataProvider' => $itemsDataProvider,
			'totalAmount' => $model->getTotalAmount()
		]);
	}

	/**
	 * Creates a new Supply model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Supply();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$params = array_merge(['model' => $model], $this->_prepareForm());
			return $this->render('create', $params);
		}
	}

	/**
	 * Updates an existing Supply model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
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
			$params = array_merge(['model' => $model], $this->_prepareForm($model->id));
			return $this->render('update', $params);
		}
	}

	/**
	 * Deletes an existing Supply model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Supply model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Supply the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Supply::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}

	/**
	 * @param int|null $supplyId
	 * @return array
	 */
	protected function _prepareForm($supplyId = null)
	{
		$accounts = Account::find()->all();
		$contractors = Client::find()->where(['is_contractor' => 1])->all();
		$warehouse = Warehouse::find()->all();
		$items = Item::find()->all();
		$newSupplyItem = new SupplyItem();
		$supplyItem = null;
		if (isset($supplyId)) {
			$supplyItem = SupplyItem::find()->where(['supply_id' => $supplyId])->all();
		}

		return [
			'accounts' => $accounts,
			'contractors' => $contractors,
			'warehouse' => $warehouse,
			'newSupplyItem' => $newSupplyItem,
			'supplyItem' => $supplyItem,
			'items' => $items,
		];
	}
}
