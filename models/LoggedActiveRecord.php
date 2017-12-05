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
	/**
	 *
	 */
	const STATUS_ACTIVE = 1;
	/**
	 *
	 */
	const STATUS_DELETE = 2;

	/**
	 * @var array
	 */
	protected $_statusAlias = [
		self::STATUS_ACTIVE => 'Active',
		self::STATUS_DELETE => 'Delete'
	];

	/**
	 * @var string
	 */
	protected $_loggerChangeInfo = 'backend\models\AdminEventLogs';

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
} 