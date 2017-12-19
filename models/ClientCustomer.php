<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client_Customer".
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $billing_card
 * @property string $email_1
 * @property string $email_2
 * @property string $email_3
 * @property string $alt_emails
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $alt_phones
 * @property string $address
 * @property string $birthday
 * @property string $note
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class ClientCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Client_Customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday', 'created', 'updated'], 'safe'],
            [['status'], 'integer'],
            [['username'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'alt_emails', 'alt_phones', 'address', 'note'], 'string', 'max' => 255],
            [['billing_card'], 'string', 'max' => 20],
            [['email_1', 'email_2', 'email_3'], 'string', 'max' => 50],
            [['phone_1', 'phone_2', 'phone_3'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'billing_card' => 'Billing Card',
            'email_1' => 'Email 1',
            'email_2' => 'Email 2',
            'email_3' => 'Email 3',
            'alt_emails' => 'Alt Emails',
            'phone_1' => 'Phone 1',
            'phone_2' => 'Phone 2',
            'phone_3' => 'Phone 3',
            'alt_phones' => 'Alt Phones',
            'address' => 'Address',
            'birthday' => 'Birthday',
            'note' => 'Note',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ClientCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ClientCustomerQuery(get_called_class());
    }
}
