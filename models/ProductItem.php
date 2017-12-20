<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_Item".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $item_id
 * @property integer $count
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 *
 * @property Item $item
 * @property Product $product
 */
class ProductItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product_Item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'item_id'], 'required'],
            [['product_id', 'item_id', 'count', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['note'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'item_id' => 'Item ID',
            'count' => 'Count',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ProductItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ProductItemQuery(get_called_class());
    }
}
