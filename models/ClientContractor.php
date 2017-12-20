<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client_Contractor".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property integer $type
 * @property string $birthday
 * @property string $title
 * @property string $company
 * @property string $director
 * @property string $manager
 * @property string $billing_card
 * @property string $edrpou_code
 * @property string $inn
 * @property string $billing_address
 * @property string $email
 * @property string $alt_emails
 * @property string $phone
 * @property string $alt_phones
 * @property string $address
 * @property string $note
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class ClientContractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Client_Contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'integer'],
            [['birthday', 'created', 'updated'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 1000],
            [['title', 'company', 'director', 'manager', 'billing_address', 'alt_emails', 'alt_phones', 'address', 'note'], 'string', 'max' => 255],
            [['billing_card'], 'string', 'max' => 20],
            [['edrpou_code', 'inn', 'email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'type' => 'Type',
            'birthday' => 'Birthday',
            'title' => 'Title',
            'company' => 'Company',
            'director' => 'Director',
            'manager' => 'Manager',
            'billing_card' => 'Billing Card',
            'edrpou_code' => 'Edrpou Code',
            'inn' => 'Inn',
            'billing_address' => 'Billing Address',
            'email' => 'Email',
            'alt_emails' => 'Alt Emails',
            'phone' => 'Phone',
            'alt_phones' => 'Alt Phones',
            'address' => 'Address',
            'note' => 'Note',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ClientContractorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ClientContractorQuery(get_called_class());
    }
}
