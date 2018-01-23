<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bank_Statement".
 *
 * @property integer $id
 * @property string $code
 * @property integer $flow_type
 * @property integer $payment_type
 * @property integer $account_id
 * @property double $amount
 * @property double $amount_vat
 * @property double $vat
 * @property integer $author_id
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $note
 *
 * @property Account $account
 * @property StaffEmployee $author
 */
class BankStatement extends \app\models\LoggedActiveRecord
{
	static $titles = [
		'rus' => [
			'main' => 'Банковская выписка',
			'plural' => 'Банковские выписки',
			'prompt' => 'Выберите бонковскую выписку'
		],
		'link' => 'bank-statement'
	];

	static $labels = [
		'id' => 'ID',
		'code' => '№',
		'flow_type' => 'Вид движения',
		'payment_type' => 'Вид платежа',
		'account_id' => 'Счет',
		'amount' => 'Сумма',
		'amount_vat' => 'Сумма + НДС',
		'vat' => 'НДС',
		'author_id' => 'Автор',
		'created' => 'Создан',
		'updated' => 'Изменен',
		'status' => 'Статус',
		'note' => 'Примечание',
	];
	/**
	 *
	 */
	const PAYMENT_TYPE_INCOME = 1;
	const PAYMENT_TYPE_OUTGOING = 2;

	const FLOW_TYPE_INCOME = 1;
	const FLOW_TYPE_OUTGOING = 2;

	/**
	 * @var array
	 */
	protected $_paymentTypeAlias = [
		self::PAYMENT_TYPE_INCOME => 'Оплата',
		self::PAYMENT_TYPE_OUTGOING => 'Возврат'
	];
	/**
	 * @var array
	 */
	protected $_flowTypeAlias = [
		self::FLOW_TYPE_INCOME => 'Поступление',
		self::FLOW_TYPE_OUTGOING => 'Выплата'
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Bank_Statement';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['code', 'flow_type', 'payment_type', 'amount', 'author_id', 'account_id'], 'required'],
			[['flow_type', 'payment_type', 'account_id', 'author_id', 'status'], 'integer'],
			[['amount', 'amount_vat', 'vat'], 'number'],
			[['created', 'updated'], 'safe'],
			[['code'], 'string', 'max' => 100],
			[['note'], 'string', 'max' => 255],
			[['code'], 'unique'],
			[['status'], 'default', 'value' => 1],
			[['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
			[['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffEmployee::className(), 'targetAttribute' => ['author_id' => 'id']],
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccount()
	{
		return $this->hasOne(Account::className(), ['id' => 'account_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthor()
	{
		return $this->hasOne(StaffEmployee::className(), ['id' => 'author_id']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\BankStatementQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\BankStatementQuery(get_called_class());
	}

	/**
	 * @return mixed
	 */
	public function getPaymentTypeAlias()
	{
		return $this->_paymentTypeAlias[$this->payment_type];
	}
	/**
	 * @return mixed
	 */
	public function getFlowTypeAlias()
	{
		return $this->_flowTypeAlias[$this->flow_type];
	}
}
