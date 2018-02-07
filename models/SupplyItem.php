<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Supply__Item".
 *
 * @property int $id
 * @property int $supply_id
 * @property int $item_id
 * @property int $measures
 * @property double $count
 * @property double $cost
 * @property string $note
 * @property int $created
 * @property int $updated
 * @property int $status
 */
class SupplyItem extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Поставка ингредиента',
			'plural' => 'Поставка ингредиентов',
			'prompt' => 'Выберите поставку ингредиента'
		],
		'link' => 'supply-item'
	];

	static $labels = [
		'id' => 'ID',
		'supply_id' => 'Поставка',
		'item_id' => 'Ингредиент',
		'measures' => 'Ед. измерения',
		'count' => 'Кол-во',
		'cost' => 'Стоимость',
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
		return 'Supply__Item';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['supply_id', 'item_id'], 'required'],
			[['supply_id', 'item_id', 'measures', 'created', 'updated', 'status'], 'integer'],
			[['count', 'cost'], 'number'],
			[['created', 'updated'], 'safe'],
			[['status'], 'default', 'value' => 1],
			[['count', 'cost'], 'default', 'value' => 0],
			[['created', 'updated'], 'default', 'value' => time()],
			[['note'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\SupplyItemQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\SupplyItemQuery(get_called_class());
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getItem()
	{
		return $this->hasOne(Item::className(), ['id' => 'item_id']);
	}
}
