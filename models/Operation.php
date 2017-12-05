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
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'type' => 'Type',
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
}
