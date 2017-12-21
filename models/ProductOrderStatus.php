<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_Order_Status".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 */
class ProductOrderStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product_Order_Status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
            'note' => 'Note',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ProductOrderStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ProductOrderStatusQuery(get_called_class());
    }
}
