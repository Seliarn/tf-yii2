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
class ProductItem extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Состав блюда',
			'plural' => 'Состав блюда'
		]
	];

	static $labels = [
		'id' => 'ID',
		'product_id' => 'Блюдо',
		'item_id' => 'Ингредиент',
		'count' => 'Количество',
		'status' => 'Статус',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'note' => 'Примечание',
	];

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
