<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cash_Flow_Statement_Group".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 *
 * @property CashFlowStatement[] $cashFlowStatements
 * @property CashFlowStatementGroup $parent
 * @property CashFlowStatementGroup[] $cashFlowStatementGroups
 */
class CashFlowStatementGroup extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Группа статей ДДС',
			'plural' => 'Группы статей ДДС'
		]
	];
	
	static $labels = [
		'id' => 'ID',
		'parent_id' => 'Родитель',
		'title' => 'Название',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'note' => 'Примечание',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Cash_Flow_Statement_Group';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'title'], 'required'],
			[['id', 'parent_id', 'status'], 'integer'],
			[['parent_id', 'status'], 'default', 'value' => 1],
			[['created', 'updated'], 'safe'],
			[['title'], 'string', 'max' => 100],
			[['note'], 'string', 'max' => 255],
			[['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => CashFlowStatementGroup::className(), 'targetAttribute' => ['parent_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCashFlowStatements()
	{
		return $this->hasMany(CashFlowStatement::className(), ['group_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getParent()
	{
		return $this->hasOne(CashFlowStatementGroup::className(), ['id' => 'parent_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCashFlowStatementGroups()
	{
		return $this->hasMany(CashFlowStatementGroup::className(), ['parent_id' => 'id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\CashFlowStatementGroupQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\CashFlowStatementGroupQuery(get_called_class());
	}
}
