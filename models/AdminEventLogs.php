<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Admin_Event_Logs".
 *
 * @property integer $id
 * @property string $event
 * @property string $sender
 * @property string $params
 * @property string $description
 * @property integer $authorId
 * @property string $authorObject
 * @property string $authorName
 * @property string $timestamp
 */
class AdminEventLogs extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Admin_Event_Logs';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['event', 'sender'], 'required'],
			[['description'], 'string'],
			[['authorId'], 'integer'],
			[['timestamp'], 'safe'],
			[['event'], 'string', 'max' => 100],
			[['sender', 'params', 'authorObject', 'authorName'], 'string', 'max' => 255],
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
			'params' => 'Params',
			'description' => 'Description',
			'authorId' => 'Author ID',
			'authorObject' => 'Author Object',
			'authorName' => 'Author Name',
			'timestamp' => 'Timestamp',
		];
	}

	/**
	 * @inheritdoc
	 * @return \app\models\aq\AdminEventLogsQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\aq\AdminEventLogsQuery(get_called_class());
	}

	public static function saveLog(Event $event, $description = null)
	{
		$params = json_encode([
			'oldAttributes' => $event->sender->getOldAttributes(),
			'currentAttributes' => $event->sender->attributes(),
		]);
		$data = [
			'event' => $event->name,
			'sender' => get_class($event->sender),
			'params' => $params,
			'description' => $description,
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

		$log = new AdminEventLogs();
		$log->attributes = $data;
		$log->save();
	}
}
