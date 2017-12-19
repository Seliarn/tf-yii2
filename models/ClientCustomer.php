<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client_Customer".
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $billing_card
 * @property string $email_1
 * @property string $email_2
 * @property string $email_3
 * @property string $alt_emails
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $alt_phones
 * @property string $address
 * @property string $birthday
 * @property string $note
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class ClientCustomer extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Клиент',
			'plural' => 'Клиенты'
		],
		'link' => 'client-customer'
	];

	static $labels = [
		'id' => 'ID',
		'username' => 'Логин',
		'first_name' => 'Имя',
		'last_name' => 'Фамилия',
		'billing_card' => 'Кредитная карта',
		'birthday' => 'День рождения',
		'email_1' => 'Email',
		'email_2' => 'Email 2',
		'email_3' => 'Email 3',
		'alt_emails' => 'Дополнительные Email',
		'phone_1' => 'Телефон',
		'phone_2' => 'Телефон 2',
		'phone_3' => 'Телефон 3',
		'alt_phones' => 'Дополнительные телефоны',
		'address' => 'Адрес',
		'note' => 'Примечание',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Client_Customer';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['birthday', 'created', 'updated'], 'safe'],
			[['status'], 'integer'],
			[['username'], 'string', 'max' => 100],
			[['first_name', 'last_name', 'alt_emails', 'alt_phones', 'address', 'note'], 'string', 'max' => 255],
			[['billing_card'], 'string', 'max' => 20],
			[['email_1', 'email_2', 'email_3'], 'string', 'max' => 50],
			[['phone_1', 'phone_2', 'phone_3'], 'string', 'max' => 15],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ClientCustomerQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ClientCustomerQuery(get_called_class());
	}
}
