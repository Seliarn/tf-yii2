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
 */
class Item extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Номенклатура',
			'plural' => 'Номенклатура'
		]
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
	];

	const MEASURES_GRAM = 1;
	const MEASURES_LITER = 2;
	const MEASURES_PIECE = 3;
	const MEASURES_METER = 4;

	const STATE_NEW = 1;

	protected $_stateAlias = [
		self::STATE_NEW => 'грамм',
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
			[['group_id', 'measures', 'state', 'status'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['title', 'note'], 'string', 'max' => 255],
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
