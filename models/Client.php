<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $birthday
 * @property string $title
 * @property string $company
 * @property string $director
 * @property string $manager
 * @property string $billing_card
 * @property string $edrpou_code
 * @property string $inn
 * @property string $billing_address
 * @property string $email
 * @property string $alt_emails
 * @property string $phone
 * @property string $alt_phones
 * @property string $address
 * @property string $note
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class Client extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Контрагент',
			'plural' => 'Контрагенты',
			'customer' => 'Клиенты',
			'contractor' => 'Поставщики'
		],
		'link' => 'client'
	];

	static $labels = [
		'id' => 'ID',
		'username' => 'Логин',
		'first_name' => 'Имя',
		'last_name' => 'Фамилия',
		'billing_card' => 'Кредитная карта',
		'birthday' => 'День рождения',
		'alt_emails' => 'Дополнительные Email',
		'alt_phones' => 'Дополнительные телефоны',
		'address' => 'Адрес',
		'note' => 'Примечание',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'title' => 'Название',
		'company' => 'Компания',
		'director' => 'Директор',
		'manager' => 'Контактное лицо',
		'edrpou_code' => 'ЕДРПОУ',
		'inn' => 'ИНН',
		'billing_address' => 'Юридический адрес',
		'is_contractor' => 'Поставщик',
		'is_customer' => 'Клиент',
		'email' => 'Email',
		'phone' => 'Телефон',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Client';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['status', 'is_contractor', 'is_customer'], 'integer'],
			[['birthday', 'created', 'updated'], 'safe'],
			[['first_name', 'last_name'], 'string', 'max' => 100],
			[['username'], 'string', 'max' => 1000],
			[['title', 'company', 'director', 'manager', 'billing_address', 'alt_emails', 'alt_phones', 'address', 'note'], 'string', 'max' => 255],
			[['billing_card'], 'string', 'max' => 20],
			[['edrpou_code', 'inn', 'email'], 'string', 'max' => 50],
			[['phone'], 'string', 'max' => 15],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ClientQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ClientQuery(get_called_class());
	}
}
