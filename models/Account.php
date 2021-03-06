<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Account".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $currency_id
 * @property integer $status
 *
 * @property Currency $currency
 * @property IncomeCashboxOrder[] $incomeCashboxOrders
 * @property OutgoingCashboxOrder[] $outgoingCashboxOrders
 */
class Account extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Счет',
			'plural' => 'Счета',
			'prompt' => 'Выберите счет'
		],
		'link' => 'account'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'description' => 'Описание',
		'currency_id' => 'Валюта',
		'status' => 'Статус'
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Account';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'currency_id'], 'required'],
			[['description'], 'string'],
			[['currency_id'], 'integer'],
			[['status'], 'integer'],
			[['title'], 'string', 'max' => 255],
			[['status'], 'default', 'value' => 1],
			[['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrency()
	{
		return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIncomeCashboxOrders()
	{
		return $this->hasMany(IncomeCashboxOrder::className(), ['account_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOutgoingCashboxOrders()
	{
		return $this->hasMany(OutgoingCashboxOrder::className(), ['account_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\AccountQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\AccountQuery(get_called_class());
	}


}
