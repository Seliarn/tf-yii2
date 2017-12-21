<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $title
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 *
 * @property ProductGroup $group
 * @property ProductItem[] $productItems
 */
class Product extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Блюдо',
			'plural' => 'Блюда'
		]
	];

	static $labels = [
		'id' => 'ID',
		'group_id' => 'Group ID',
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
		return 'Product';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['group_id', 'status'], 'integer'],
			[['title'], 'required'],
			[['created', 'updated'], 'safe'],
			[['title', 'note'], 'string', 'max' => 255],
			[['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGroup()
	{
		return $this->hasOne(ProductGroup::className(), ['id' => 'group_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProductItems()
	{
		return $this->hasMany(ProductItem::className(), ['product_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ProductQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ProductQuery(get_called_class());
	}
}
