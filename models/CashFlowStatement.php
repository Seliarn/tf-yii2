<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cash_Flow_Statement".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $title
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 *
 * @property CashFlowStatementGroup $group
 * @property IncomeCashboxOrder[] $incomeCashboxOrders
 * @property OutgoingCashboxOrder[] $outgoingCashboxOrders
 */
class CashFlowStatement extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Статья ДДС',
			'plural' => 'Статьи ДДС'
		]
	];

	static $labels = [
		'id' => 'ID',
		'group_id' => 'Группа',
		'title' => 'Название',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'note' => 'Примечание',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Cash_Flow_Statement';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['group_id', 'status'], 'integer'],
			[['group_id', 'status'], 'default', 'value' => 1],
			[['created', 'updated'], 'safe'],
			[['title'], 'string', 'max' => 100],
			[['note'], 'string', 'max' => 255],
			[['status'], 'default', 'value' => 1],
			[['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CashFlowStatementGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGroup()
	{
		return $this->hasOne(CashFlowStatementGroup::className(), ['id' => 'group_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIncomeCashboxOrders()
	{
		return $this->hasMany(IncomeCashboxOrder::className(), ['cash_flow_statement_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOutgoingCashboxOrders()
	{
		return $this->hasMany(OutgoingCashboxOrder::className(), ['cash_flow_statement_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\CashFlowStatementQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\CashFlowStatementQuery(get_called_class());
	}
}
