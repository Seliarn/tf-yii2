<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Warehouse".
 *
 * @property integer $id
 * @property string $title
 * @property string $phone
 * @property string $alt_phones
 * @property string $email
 * @property string $alt_emails
 * @property string $address
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class Warehouse extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Склад',
			'plural' => 'Склады'
		]
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'phone' => 'Телефон',
		'alt_phones' => 'Дополнительные телефоны',
		'email' => 'Email',
		'alt_emails' => 'Дополнительные Email',
		'address' => 'Адрес',
		'status' => 'Статус',
		'created' => 'Создан',
		'updated' => 'Изменен'
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Warehouse';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['created', 'updated'], 'safe'],
			[['status'], 'integer'],
			[['title', 'alt_phones', 'alt_emails', 'address'], 'string', 'max' => 255],
			[['phone'], 'string', 'max' => 15],
			[['email'], 'string', 'max' => 30],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\WarehouseQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\WarehouseQuery(get_called_class());
	}
}
