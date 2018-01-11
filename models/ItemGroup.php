<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Item_Group".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property integer $count
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 */
class ItemGroup extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Категория',
			'plural' => 'Категории'
		],
		'link' => 'item-group'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'parent_id' => 'Родительская',
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
		return 'Item_Group';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['parent_id', 'count', 'status'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['title', 'note'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ItemGroupQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ItemGroupQuery(get_called_class());
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getParent()
	{
		return $this->hasOne(ItemGroup::className(), ['id' => 'parent_id']);
	}
}
