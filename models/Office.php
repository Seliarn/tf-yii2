<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Office".
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $note
 * @property integer $status
 *
 * @property StaffDepartment[] $staffDepartments
 */
class Office extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Офис',
			'plural' => 'Офисы'
		]
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'address' => 'Адрес',
		'email' => 'E-mail',
		'phone' => 'Телефон',
		'note' => 'Примечание',
		'status' => 'Статус',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Office';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['address'], 'string'],
			[['status'], 'default', 'value' => 1],
			[['title', 'email', 'phone', 'note'], 'string', 'max' => 255],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStaffDepartments()
	{
		return $this->hasMany(StaffDepartment::className(), ['office_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\OfficeQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\OfficeQuery(get_called_class());
	}
}
