<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client_Contractor".
 *
 * @property integer $id
 * @property string $title
 * @property string $company
 * @property string $director
 * @property string $manager
 * @property string $billing_card
 * @property string $edrpou_code
 * @property string $inn
 * @property string $billing_address
 * @property string $email_1
 * @property string $email_2
 * @property string $email_3
 * @property string $alt_emails
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $alt_phones
 * @property string $address
 * @property string $note
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class ClientContractor extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Поставщик',
			'plural' => 'Поставщики'
		],
		'link' => 'client-contractor'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'company' => 'Компания',
		'director' => 'Директор',
		'manager' => 'Контактное лицо',
		'billing_card' => 'Номер кредитной карты',
		'edrpou_code' => 'ЕДРПОУ',
		'inn' => 'ИНН',
		'billing_address' => 'Юридический адрес',
		'email_1' => 'Email 1',
		'email_2' => 'Email 2',
		'email_3' => 'Email 3',
		'alt_emails' => 'Дополнительные Email',
		'phone_1' => 'Телефон 1',
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
		return 'Client_Contractor';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['created', 'updated'], 'safe'],
			[['status'], 'integer'],
			[['title', 'company', 'director', 'manager', 'billing_address', 'alt_emails', 'alt_phones', 'address', 'note'], 'string', 'max' => 255],
			[['billing_card'], 'string', 'max' => 20],
			[['edrpou_code', 'inn', 'email_1', 'email_2', 'email_3'], 'string', 'max' => 50],
			[['phone_1', 'phone_2', 'phone_3'], 'string', 'max' => 15],
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ClientContractorQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ClientContractorQuery(get_called_class());
	}
}
