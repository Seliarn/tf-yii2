<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Item".
 *
 * @property integer $id
 * @property string $title
 * @property integer $group_id
 * @property integer $measures
 * @property integer $state
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['group_id', 'measures', 'state', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'group_id' => 'Group ID',
            'measures' => 'Measures',
            'state' => 'State',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'note' => 'Note',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ItemQuery(get_called_class());
    }
}