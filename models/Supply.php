<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Supply".
 *
 * @property int $id
 * @property int $date
 * @property int $contractor_id
 * @property int $warehouse_id
 * @property int $account_id
 * @property string $note
 * @property int $created
 * @property int $updated
 * @property int $status
 */
class Supply extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Поставка',
			'plural' => 'Поставки',
			'prompt' => 'Выберите поставку'
		],
		'link' => 'supply'
	];

	static $labels = [
		'id' => 'ID',
		'date' => 'Дата закупки',
		'contractor_id' => 'Поставщик',
		'warehouse_id' => 'Склад',
		'account_id' => 'Счет',
		'status' => 'Статус',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'note' => 'Примечание',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Supply';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['contractor_id', 'warehouse_id', 'account_id', 'status'], 'integer'],
			[['contractor_id', 'warehouse_id'], 'required'],
			[['date', 'created', 'updated'], 'safe'],
			[['status'], 'default', 'value' => 1],
			[['created', 'updated'], 'default', 'value' => time()],
			[['note'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\SupplyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\SupplyQuery(get_called_class());
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccount()
	{
		return $this->hasOne(Account::className(), ['id' => 'account_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getWarehouse()
	{
		return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getContractor()
	{
		return $this->hasOne(Client::className(), ['id' => 'contractor_id']);
	}
}
