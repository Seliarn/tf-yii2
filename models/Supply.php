<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Supply".
 *
 * @property int $id
 * @property int $date
 * @property int $contractor_id
 * @property int $warehouse_id
 * @property int $account_id
 * @property string $note
 * @property int $created
 * @property int $updated
 * @property int $status
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Supply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'contractor_id', 'warehouse_id', 'account_id', 'created', 'updated', 'status'], 'integer'],
            [['contractor_id', 'warehouse_id', 'note'], 'required'],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'contractor_id' => 'Contractor ID',
            'warehouse_id' => 'Warehouse ID',
            'account_id' => 'Account ID',
            'note' => 'Note',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\SupplyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\SupplyQuery(get_called_class());
    }
}
