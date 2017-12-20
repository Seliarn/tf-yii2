<?php
/**
 * Created by PhpStorm.
 * User: doctor
 * Date: 12/7/17
 * Time: 7:58 PM
 */

namespace app\models;

abstract class CashboxOrder extends LoggedActiveRecord
{
	const PAYMENT_TYPE_PAY = 1;
	const PAYMENT_TYPE_RETURN = 2;

	/**
	 * @var array
	 */
	protected $_paymentTypeAlias = [
		self::PAYMENT_TYPE_PAY => 'Оплата',
		self::PAYMENT_TYPE_RETURN => 'Возврат'
	];

	/**
	 * @var array
	 */
	protected $_statusAlias = [
		self::STATUS_ACTIVE => 'Проведен',
		self::STATUS_DELETE => 'Удален',
		self::STATUS_DRAFT => 'Черновик'
	];

	static $labels = [
		'id' => 'ID',
		'code' => '№',
		'operation_id' => 'Операция',
		'account_id' => 'Вид оплаты',
		'account_book_id' => 'Счет',
		'cash_flow_statement_id' => 'Статья ДДС',
		'payment_type' => 'Тип оплаты',
		'note' => 'Примечание',
		'subconto_id' => 'Cубконто',
		'subconto_model_id' => 'Субконто',
		'contractor_id' => 'Контрагент',
		'currency_id' => 'Валюта',
		'amount' => 'Сумма',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'date' => 'Дата операции',
		'status' => 'Статус',
		'state' => 'Статус',
	];

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'operation_id', 'account_id', 'cash_flow_statement_id', 'amount', 'currency_id', 'account_book_id'], 'required'],
			[['operation_id', 'account_id', 'cash_flow_statement_id', 'subconto_id', 'status', 'currency_id', 'state', 'contractor_id', 'payment_type', 'account_book_id'], 'integer'],
			[['note'], 'string'],
			[['amount'], 'number'],
			[['created', 'updated', 'date'], 'safe'],
			[['code'], 'string', 'max' => 50],
			[['code'], 'unique'],
			[['status', 'currency_id', 'state', 'payment_type'], 'default', 'value' => 1],
			[['operation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['operation_id' => 'id']],
			[['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
			[['account_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountBook::className(), 'targetAttribute' => ['account_book_id' => 'id']],
			[['cash_flow_statement_id'], 'exist', 'skipOnError' => true, 'targetClass' => CashFlowStatement::className(), 'targetAttribute' => ['cash_flow_statement_id' => 'id']],
			[['subconto_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffEmployee::className(), 'targetAttribute' => ['subconto_id' => 'id']],
			[['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientContractor::className(), 'targetAttribute' => ['contractor_id' => 'id']],
			[['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOperation()
	{
		return $this->hasOne(Operation::className(), ['id' => 'operation_id']);
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
	public function getCashFlowStatement()
	{
		return $this->hasOne(CashFlowStatement::className(), ['id' => 'cash_flow_statement_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSubconto()
	{
		return $this->hasOne(StaffEmployee::className(), ['id' => 'subconto_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getContractor()
	{
		return $this->hasOne(ClientContractor::className(), ['id' => 'contractor_id']);
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
	public function getAccountBook()
	{
		return $this->hasOne(AccountBook::className(), ['id' => 'account_book_id']);
	}

	/**
	 * @return mixed
	 */
	public function getPaymentTypeAlias()
	{
		return $this->_paymentTypeAlias[$this->payment_type];
	}

	/**
	 * @return mixed
	 */
	public function getStatusAlias()
	{
		return $this->_statusAlias[$this->status];
	}
} 