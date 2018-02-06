<?php
/**
 * Created by PhpStorm.
 * User: doctor
 * Date: 7/18/17
 * Time: 8:38 PM
 */

namespace app\models\common;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * Class UploadImageForm
 * @package models\common
 */
class UploadImageForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;
	/**
	 * @var string
	 */
	public $path = '';

	/**
	 * @return array
	 */
	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
		];
	}

	/**
	 * @param string $savePath
	 * @param string $fileName
	 * @return bool
	 */
	public function upload($savePath = '', $fileName = '')
	{
		if (empty($fileName)) {
			$fileName = self::_generateFileHashName();
		}
		if ($this->validate() && !empty($this->imageFile)) {
			if (FileHelper::createDirectory('uploads/' . $savePath)) {
				$path = 'uploads/' . $savePath . '/' . $fileName . '.' . $this->imageFile->extension;

				if ($this->imageFile->saveAs($path)) {
					$this->path = $path;
				} else {
					return false;
				}
			} else {
				return false;
			}

			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return string
	 */
	static function _generateFileHashName()
	{
		return 'img_' . md5(time());
	}
}