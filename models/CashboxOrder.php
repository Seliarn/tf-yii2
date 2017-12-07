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

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'operation_id', 'account_id', 'cash_flow_statement_id', 'subcount_id', 'amount'], 'required'],
			[['operation_id', 'account_id', 'cash_flow_statement_id', 'subcount_id', 'status'], 'integer'],
			[['note'], 'string'],
			[['amount'], 'number'],
			[['created', 'updated'], 'safe'],
			[['code'], 'string', 'max' => 50],
			[['code'], 'unique'],
			[['status'], 'default', 'value' => 1],
			[['operation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['operation_id' => 'id']],
			[['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
			[['cash_flow_statement_id'], 'exist', 'skipOnError' => true, 'targetClass' => CashFlowStatement::className(), 'targetAttribute' => ['cash_flow_statement_id' => 'id']],
			[['subcount_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffEmployee::className(), 'targetAttribute' => ['subcount_id' => 'id']],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels($attr = null)
	{
		$labels = [
			'id' => 'ID',
			'code' => '№',
			'operation_id' => 'Операция',
			'account_id' => 'Счет',
			'cash_flow_statement_id' => 'Статья ДДС',
			'note' => 'Примечание',
			'subcount_id' => 'Субконто',
			'amount' => 'Сумма',
			'created' => 'Создан',
			'updated' => 'Изменен',
			'status' => 'Статус',
		];

		if (!empty($attr)) {
			return $labels[$attr];
		}

		return $labels;
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
	public function getSubcount()
	{
		return $this->hasOne(StaffEmployee::className(), ['id' => 'subcount_id']);
	}

} 