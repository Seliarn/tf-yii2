<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Account_Book".
 *
 * @property integer $id
 * @property integer $code
 * @property string $title
 * @property integer $subconto_model_id
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 *
 * @property SubcontoModel $subcontoModel
 */
class AccountBook extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'План счетов',
			'plural' => 'Планы счетов'
		]
	];

	static $labels = [
		'id' => 'ID',
		'code' => 'Код',
		'title' => 'Название',
		'subconto_model_id' => 'Субконто',
		'status' => 'Статус',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'note' => 'Примечание',
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Account_Book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'title'], 'required'],
            [['code', 'subconto_model_id', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title', 'note'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['subconto_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubcontoModel::className(), 'targetAttribute' => ['subconto_model_id' => 'id']],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcontoModel()
    {
        return $this->hasOne(SubcontoModel::className(), ['id' => 'subconto_model_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\AccountBookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\AccountBookQuery(get_called_class());
    }
}
