<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_Order_Status".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $created
 * @property string $updated
 * @property string $note
 */
class ProductOrderStatus extends LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Статус заказа',
			'plural' => 'Статусы заказов',
			'prompt' => 'Выберите статус заказа'
		],
		'link' => 'product-order-status'
	];

	static $labels = [
		'id' => 'ID',
		'title' => 'Название',
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
        return 'Product_Order_Status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\aq\ProductOrderStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\aq\ProductOrderStatusQuery(get_called_class());
    }
}
