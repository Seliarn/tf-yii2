<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Staff_Department".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property integer $office_id
 * @property string $note
 *
 * @property StaffDepartment $parent
 * @property StaffDepartment[] $staffDepartments
 * @property Office $office
 * @property StaffEmployee[] $staffEmployees
 */
class StaffDepartment extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Подразделение',
			'plural' => 'Подразделения'
		]
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
		'parent_id' => 'Подразделение',
		'office_id' => 'Офис',
		'note' => 'Note',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Staff_Department';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'office_id'], 'required'],
			[['parent_id', 'office_id'], 'integer'],
			[['title'], 'string', 'max' => 255],
			[['note'], 'string', 'max' => 255],
			[['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffDepartment::className(), 'targetAttribute' => ['parent_id' => 'id']],
			[['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['office_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getParent()
	{
		return $this->hasOne(StaffDepartment::className(), ['id' => 'parent_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStaffDepartments()
	{
		return $this->hasMany(StaffDepartment::className(), ['parent_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOffice()
	{
		return $this->hasOne(Office::className(), ['id' => 'office_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStaffEmployees()
	{
		return $this->hasMany(StaffEmployee::className(), ['department_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\StaffDepartmentQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\StaffDepartmentQuery(get_called_class());
	}
}
