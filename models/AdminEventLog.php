<?php

namespace backend\models;

use Yii;
use yii\base\Event;

/**
 * This is the model class for table "admin_event_log".
 *
 * @property integer $id
 * @property string $event
 * @property string $sender
 * @property string $description
 * @property integer $authorId
 * @property string $authorObject
 * @property string $authorName
 * @property string $timestamp
 */
class AdminEventLog extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'admin_event_log';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['event', 'sender'], 'required'],
			[['description'], 'string'],
			[['authorId', 'timestamp'], 'integer'],
			[['event'], 'string', 'max' => 100],
			[['sender', 'authorObject', 'authorName'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'event' => 'Event',
			'sender' => 'Sender',
			'description' => 'Description',
			'authorId' => 'Author ID',
			'authorObject' => 'Author Object',
			'authorName' => 'Author Name',
			'timestamp' => 'Time',
		];
	}

	public static function saveLog(Event $event)
	{
		$descripton = json_encode([
			'oldAttributes' => $event->sender->getOldAttributes(),
			'currentAttributes' => $event->sender->attributes(),
		]);
		$data = [
			'event' => $event->name,
			'sender' => get_class($event->sender),
			'description' => $descripton,
			'authorId' => 0,
			'authorObject' => '',
			'authorName' => '',
			'timestamp' => time(),
		];

		if (!empty(Yii::$app->user->identity)) {
			$data['authorId'] = Yii::$app->user->identity->id;
			$data['authorObject'] = get_class(Yii::$app->user->identity);
			$data['authorName'] = Yii::$app->user->identity->username;
		}

		$log = new AdminEventLog();
		$log->attributes = $data;
		$log->save();
	}
}
