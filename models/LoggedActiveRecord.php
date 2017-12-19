<?php
/**
 * Created by PhpStorm.
 * User: doctor
 * Date: 12/5/17
 * Time: 4:40 PM
 */

namespace app\models;


abstract class LoggedActiveRecord extends \yii\db\ActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_DELETE = 2;
	const STATUS_DRAFT = 3;

	/**
	 * @var array
	 */
	protected $_statusAlias = [
		self::STATUS_ACTIVE => 'Активный',
		self::STATUS_DELETE => 'Удален',
		self::STATUS_DRAFT => 'Черновик'
	];

	/**
	 * @var string
	 */
	protected $_loggerChangeInfo = 'app\models\AdminEventLogs';

	/**
	 *
	 */
	public function init()
	{
		parent::init();
		$this->on(self::EVENT_AFTER_UPDATE, [$this->_loggerChangeInfo, 'saveLog']);
		$this->on(self::EVENT_AFTER_INSERT, [$this->_loggerChangeInfo, 'saveLog']);
		$this->on(self::EVENT_AFTER_DELETE, [$this->_loggerChangeInfo, 'saveLog']);
	}


	/**
	 * @return mixed
	 */
	public function getStatusAlias()
	{
		return $this->_statusAlias[$this->status];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels($attr = null)
	{
		if (!empty($attr)) {
			return static::$labels[$attr];
		}

		return static::$labels;
	}


	/**
	 * @return bool
	 */
	public function delete()
	{
		$this->status = self::STATUS_DELETE;
		return $this->update();
	}
} 