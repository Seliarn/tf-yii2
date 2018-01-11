<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_Group".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 *
 * @property Product[] $products
 * @property ProductGroup $parent
 * @property ProductGroup[] $productGroups
 */
class ProductGroup extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Категория',
			'plural' => 'Категории'
		],
		'link' => 'product-group'
	];

	static $labels = [
		'id' => 'ID',
		'parent_id' => 'Родительская',
		'title' => 'Название',
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
		return 'Product_Group';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['parent_id', 'status'], 'integer'],
			[['title'], 'required'],
			[['created', 'updated'], 'safe'],
			[['title', 'note'], 'string', 'max' => 255],
			[['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductGroup::className(), 'targetAttribute' => ['parent_id' => 'id']],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProducts()
	{
		return $this->hasMany(Product::className(), ['group_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getParent()
	{
		return $this->hasOne(ProductGroup::className(), ['id' => 'parent_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProductGroups()
	{
		return $this->hasMany(ProductGroup::className(), ['parent_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ProductGroupQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ProductGroupQuery(get_called_class());
	}
}
