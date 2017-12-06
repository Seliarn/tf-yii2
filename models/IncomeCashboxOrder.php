<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Income_Cashbox_Order".
 *
 * @property integer $id
 * @property string $code
 * @property integer $operation_id
 * @property integer $account_id
 * @property integer $cash_flow_statement_id
 * @property string $note
 * @property integer $subcount_id
 * @property double $amount
 * @property string $created
 * @property string $updated
 * @property integer $status
 *
 * @property Operation $operation
 * @property Account $account
 * @property CashFlowStatement $cashFlowStatement
 * @property StaffEmployee $subcount
 */
class IncomeCashboxOrder extends LoggedActiveRecord
{

	static $titles = [
		'rus' => [
			'main' => 'Приходный кассовый ордер',
			'plural' => 'Приходные кассовые ордеры'
		]
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Income_Cashbox_Order';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'operation_id', 'account_id', 'cash_flow_statement_id', 'subcount_id', 'amount', 'status'], 'required'],
			[['operation_id', 'account_id', 'cash_flow_statement_id', 'subcount_id', 'status'], 'integer'],
			[['note'], 'string'],
			[['amount'], 'number'],
			[['created', 'updated'], 'safe'],
			[['code'], 'string', 'max' => 50],
			[['code'], 'unique'],
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

	/**
	 * @inheritdoc
	 * @return \app\models\aq\IncomeCashboxOrderQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\IncomeCashboxOrderQuery(get_called_class());
	}
}
