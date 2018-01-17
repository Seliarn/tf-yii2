<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Staff_Employee".
 *
 * @property integer $id
 * @property integer $department_id
 * @property integer $position_id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $note
 * @property integer $status
 * @property string $hired
 *
 * @property IncomeCashboxOrder[] $incomeCashboxOrders
 * @property OutgoingCashboxOrder[] $outgoingCashboxOrders
 * @property StaffDepartment $department
 * @property StaffPosition $position
 */
class StaffEmployee extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Сотрудник',
			'plural' => 'Сотрудники',
			'prompt' => 'Выберите сотрудника'
		]
	];

	static $labels = [
		'id' => 'ID',
		'department_id' => 'Подразделение',
		'position_id' => 'Должность',
		'username' => 'Имя пользователя',
		'password' => 'Пароль',
		'auth_key' => 'Auth Key',
		'password_hash' => 'Password Hash',
		'password_reset_token' => 'Password Reset Token',
		'first_name' => 'Имя',
		'last_name' => 'Фамилия',
		'email' => 'E-mail',
		'phone' => 'Телефон',
		'note' => 'Примечание',
		'status' => 'Статус',
		'hired' => 'Нанят',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Staff_Employee';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['department_id', 'position_id', 'username', 'password'], 'required'],
			[['department_id', 'position_id', 'status'], 'integer'],
			[['hired'], 'safe'],
			[['status'], 'default', 'value' => 1],
			[['username', 'password'], 'string', 'max' => 100],
			[['auth_key'], 'string', 'max' => 32],
			[['password_hash', 'password_reset_token', 'first_name', 'last_name', 'email', 'phone', 'note'], 'string', 'max' => 255],
			[['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffDepartment::className(), 'targetAttribute' => ['department_id' => 'id']],
			[['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffPosition::className(), 'targetAttribute' => ['position_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIncomeCashboxOrders()
	{
		return $this->hasMany(IncomeCashboxOrder::className(), ['subconto_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOutgoingCashboxOrders()
	{
		return $this->hasMany(OutgoingCashboxOrder::className(), ['subconto_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDepartment()
	{
		return $this->hasOne(StaffDepartment::className(), ['id' => 'department_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPosition()
	{
		return $this->hasOne(StaffPosition::className(), ['id' => 'position_id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\StaffEmployeeQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\StaffEmployeeQuery(get_called_class());
	}
}
