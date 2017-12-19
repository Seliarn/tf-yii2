<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_Order".
 *
 * @property integer $id
 * @property string $customer_id
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property integer $product_order_status_id
 * @property string $note
 * @property string $client_note
 */
class ProductOrder extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Заказ',
			'plural' => 'Заказы'
		]
	];

	static $labels = [
		'id' => 'ID',
		'customer_id' => 'Клиент',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'product_order_status_id' => 'Статус заказа',
		'note' => 'Примечание',
		'client_note' => 'Сумма',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Product_Order';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['customer_id'], 'required'],
			[['created', 'updated'], 'safe'],
			[['status'], 'default', 'value' => 1],
			[['status', 'product_order_status_id', 'customer_id'], 'integer'],
			[['client', 'note', 'client_note'], 'string', 'max' => 255],
			[['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientCustomer::className(), 'targetAttribute' => ['customer_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCustomer()
	{
		return $this->hasOne(ClientCustomer::className(), ['id' => 'customer_id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\ProductOrderQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\ProductOrderQuery(get_called_class());
	}
}
