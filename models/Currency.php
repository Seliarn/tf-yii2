<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Currency".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 *
 * @property Account[] $accounts
 */
class Currency extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Валюта',
			'plural' => 'Валюты',
			'prompt' => 'Выберите валюту'
		],
		'link' => 'currency'
	];

	static $labels = [
		'id' => 'ID',
		'code' => 'Код',
		'title' => 'Название',
		'created' => 'Создан',
		'updated' => 'Обновлен',
		'status' => 'Статус',
		'note' => 'Примечание',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Currency';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'title'], 'required'],
			[['status'], 'integer'],
			[['status'], 'default', 'value' => 1],
			[['created', 'updated'], 'safe'],
			[['note'], 'string', 'max' => 255],
			[['title'], 'string', 'max' => 100],
			[['code'], 'string', 'max' => 50],
			[['code'], 'unique'],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccounts()
	{
		return $this->hasMany(Account::className(), ['currency_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\CurrencyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\CurrencyQuery(get_called_class());
	}
}
