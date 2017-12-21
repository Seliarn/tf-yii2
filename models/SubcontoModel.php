<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Subconto_Model".
 *
 * @property integer $id
 * @property string $class_name
 * @property string $title
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 *
 * @property AccountBook[] $accountBooks
 */
class SubcontoModel extends LoggedActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Subconto_Model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name'], 'required'],
            [['status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['class_name', 'title'], 'string', 'max' => 255],
            [['note'], 'string', 'max' => 100],
            [['class_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
            'title' => 'Title',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
            'note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBooks()
    {
        return $this->hasMany(AccountBook::className(), ['subconto_model_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\SubcontoModelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\SubcontoModelQuery(get_called_class());
    }
}
