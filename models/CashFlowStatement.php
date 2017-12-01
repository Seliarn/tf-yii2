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
class CashFlowStatement extends \yii\db\ActiveRecord
{
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
            [['group_id', 'title', 'status'], 'required'],
            [['group_id', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['note'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CashFlowStatementGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'title' => 'Title',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'note' => 'Note',
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
