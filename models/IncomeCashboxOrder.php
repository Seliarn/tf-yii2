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
 * @property integer $subconto_id
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
class IncomeCashboxOrder extends CashboxOrder
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
	 * @return \app\models\aq\IncomeCashboxOrderQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\IncomeCashboxOrderQuery(get_called_class());
	}
}
