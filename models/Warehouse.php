<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Warehouse".
 *
 * @property integer $id
 * @property string $title
 * @property string $phone
 * @property string $alt_phones
 * @property string $email
 * @property string $alt_emails
 * @property string $address
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created', 'updated'], 'safe'],
            [['status'], 'integer'],
            [['title', 'alt_phones', 'alt_emails', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 30],
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
            'phone' => 'Phone',
            'alt_phones' => 'Alt Phones',
            'email' => 'Email',
            'alt_emails' => 'Alt Emails',
            'address' => 'Address',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\WarehouseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\WarehouseQuery(get_called_class());
    }
}
