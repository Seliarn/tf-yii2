<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Warehouse_Items".
 *
 * @property integer $id
 * @property integer $warehouse_id
 * @property integer $item_id
 * @property integer $count
 * @property integer $state
 * @property double $cost
 * @property double $amount
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 *
 * @property Item $item
 * @property Warehouse $warehouse
 */
class WarehouseItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Warehouse_Items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'item_id'], 'required'],
            [['warehouse_id', 'item_id', 'count', 'state', 'status'], 'integer'],
            [['cost', 'amount'], 'number'],
            [['created', 'updated'], 'safe'],
            [['note'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse_id' => 'Warehouse ID',
            'item_id' => 'Item ID',
            'count' => 'Count',
            'state' => 'State',
            'cost' => 'Cost',
            'amount' => 'Amount',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\WarehouseItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\WarehouseItemsQuery(get_called_class());
    }
}
