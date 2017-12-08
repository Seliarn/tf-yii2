<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Staff_Position".
 *
 * @property integer $id
 * @property string $title
 *
 * @property StaffEmployee[] $staffEmployees
 */
class StaffPosition extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Должность',
			'plural' => 'Должности'
		]
	];
	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
	];


	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Staff_Position';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['title'], 'string', 'max' => 255],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStaffEmployees()
	{
		return $this->hasMany(StaffEmployee::className(), ['position_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\StaffPositionQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\StaffPositionQuery(get_called_class());
	}
}
