<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Operation".
 *
 * @property integer $id
 * @property string $title
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property integer $type
 *
 * @property IncomeCashboxOrder[] $incomeCashboxOrders
 * @property OutgoingCashboxOrder[] $outgoingCashboxOrders
 */
class Operation extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Операция',
			'plural' => 'Операции',
			'prompt' => 'Выберите операцию'
		],
		'link' => 'operation'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'type' => 'Тип',
	];


	/**
	 *
	 */
	const TYPE_INCOME = 1;
	const TYPE_OUTGOING = 2;

	/**
	 * @var array
	 */
	protected $_typeAlias = [
		self::TYPE_INCOME => 'Приходная',
		self::TYPE_OUTGOING => 'Расходная'
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Operation';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'status', 'type'], 'required'],
			[['created', 'updated'], 'safe'],
			[['status', 'type'], 'integer'],
			[['status'], 'default', 'value' => 1],
			[['title'], 'string', 'max' => 255],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIncomeCashboxOrders()
	{
		return $this->hasMany(IncomeCashboxOrder::className(), ['operation_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOutgoingCashboxOrders()
	{
		return $this->hasMany(OutgoingCashboxOrder::className(), ['operation_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\OperationQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\OperationQuery(get_called_class());
	}

	/**
	 * @return mixed
	 */
	public function getOperationTypeAlias()
	{
		return $this->_typeAlias[$this->type];
	}
}
