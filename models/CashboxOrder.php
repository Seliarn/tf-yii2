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
	static $labels = [
		'id' => 'ID',
		'code' => '№',
		'operation_id' => 'Операция',
		'account_id' => 'Счет',
		'cash_flow_statement_id' => 'Статья ДДС',
		'note' => 'Примечание',
		'subconto_id' => 'Тип субконто',
		'subconto_model_id' => 'Субконто',
		'contractor_id' => 'Контрагент',
		'currency_id' => 'Валюта',
		'amount' => 'Сумма',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'date' => 'Дата',
		'status' => 'Системный статус',
		'state' => 'Статус',
	];

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'operation_id', 'account_id', 'cash_flow_statement_id', 'subconto_id', 'amount'], 'required'],
			[['operation_id', 'account_id', 'cash_flow_statement_id', 'subconto_id', 'status', 'currency_id', 'state', 'contractor_id'], 'integer'],
			[['note'], 'string'],
			[['amount'], 'number'],
			[['created', 'updated', 'date'], 'safe'],
			[['code'], 'string', 'max' => 50],
			[['code'], 'unique'],
			[['status', 'currency_id', 'state'], 'default', 'value' => 1],
			[['operation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['operation_id' => 'id']],
			[['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
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

} 