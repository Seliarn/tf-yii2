<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Item".
 *
 * @property integer $id
 * @property string $title
 * @property integer $group_id
 * @property integer $measures
 * @property integer $state
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 * @property string $imagePath
 * @property integer $losses_clear
 * @property integer $losses_cook
 * @property integer $losses_fry
 * @property integer $losses_stew
 * @property integer $losses_bake
 * @property integer $weight
 */
class Item extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Ингредиенты',
			'plural' => 'Ингредиенты',
			'prompt' => 'Выберите ингредиент'
		],
		'link' => 'item'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'state' => 'Состояние',
		'group_id' => 'Категория',
		'measures' => 'Ед. измерения',
		'status' => 'Статус',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'note' => 'Примечание',
		'imagePath' => 'Изображение',
		'losses_clear' => '% потерь при очистке',
		'losses_cook' => '% потерь при варке',
		'losses_fry' => '% потерь при жарке',
		'losses_stew' => '% потерь при тушении',
		'losses_bake' => '% потерь при запекании',
		'weight' => 'Вес',
	];

	const MEASURES_GRAM = 1;
	const MEASURES_LITER = 2;
	const MEASURES_PIECE = 3;
	const MEASURES_METER = 4;

	const STATE_NEW = 1;

	protected $_stateAlias = [
		self::STATE_NEW => 'новый',
	];

	protected $_measuresAlias = [
		self::MEASURES_GRAM => 'грамм',
		self::MEASURES_LITER => 'литр',
		self::MEASURES_PIECE => 'штука',
		self::MEASURES_METER => 'метр',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Item';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['group_id', 'measures', 'state', 'status', 
				'losses_clear', 'losses_cook', 'losses_stew', 'losses_fry', 'losses_bake', 'weight'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['measures', 'state', 'status'], 'default', 'value' => 1],
			[['updated'], 'default', 'value' => time()],
			[['losses_clear', 'losses_cook', 'losses_stew', 'losses_fry', 'losses_bake', 'weight'], 'default', 'value' => 0],
			[['title', 'note', 'imagePath'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ItemQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ItemQuery(get_called_class());
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGroup()
	{
		return $this->hasOne(ItemGroup::className(), ['id' => 'group_id']);
	}

	/**
	 * @return mixed
	 */
	public function getMeasuresAlias()
	{
		return $this->_measuresAlias[$this->measures];
	}

	/**
	 * @return mixed
	 */
	public function getStateAlias()
	{
		return $this->_stateAlias[$this->state];
	}
}
