<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Outgoing_Cashbox_Order".
 *
 * @property integer $id
 * @property string $code
 * @property integer $operation_id
 * @property integer $account_id
 * @property integer $cash_flow_statement_id
 * @property string $note
 * @property integer $subconto_id
 * @property double $amount
 * @property string $updated
 * @property string $created
 * @property integer $status
 *
 * @property Operation $operation
 * @property Account $account
 * @property CashFlowStatement $cashFlowStatement
 * @property StaffEmployee $subcount
 */
class OutgoingCashboxOrder extends CashboxOrder
{
	static $titles = [
		'rus' => [
			'main' => 'Списание ДС',
			'plural' => 'Списание ДС'
		]
	];
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Outgoing_Cashbox_Order';
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\OutgoingCashboxOrderQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\OutgoingCashboxOrderQuery(get_called_class());
	}
}
