<?php

namespace common\models\db;

use common\models\queries\FileQuery;
use common\models\service\FileService;
use common\yii\validators\DateValidator;
use common\yii\validators\IntegerValidator;
use common\yii\validators\RequiredValidator;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;
use common\yii\validators\UniqueValidator;

use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

/**
 * Модель Files
 * Class Files
 * @package common\models\db
 *
 * @property string $id
 * @property integer $size
 * @property string $name
 * @property string $original_name
 * @property string $dir
 * @property string $date_create
 *
 * @author Maxim Podberezhskiy
 */
class Files extends ActiveRecord
{
	const TABLE_NAME = 'files';

	const ATTR_ID               = 'id';
	const ATTR_SIZE             = 'size';
	const ATTR_NAME             = 'name';
	const ATTR_ORIGINAL_NAME    = 'original_name';
	const ATTR_DIR              = 'dir';
	const ATTR_DATE_CREATE      = 'date_create';

	const DIR_UPLOAD    = 'upload';

	/**
	 * {@inheritdoc}
	 */
	public static function tableName(): string
	{
		return static::TABLE_NAME;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function rules(): array
	{
		return [
			[static::ATTR_ID, IntegerValidator::class],
			[static::ATTR_ID, UniqueValidator::class],

			[static::ATTR_SIZE, IntegerValidator::class],
			[static::ATTR_SIZE, RequiredValidator::class],

			[static::ATTR_NAME, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_NAME, TrimValidator::class],
			[static::ATTR_NAME, RequiredValidator::class],

			[static::ATTR_ORIGINAL_NAME, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_ORIGINAL_NAME, TrimValidator::class],
			[static::ATTR_ORIGINAL_NAME, RequiredValidator::class],

			[static::ATTR_DIR, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_DIR, TrimValidator::class],
			[static::ATTR_DIR, RequiredValidator::class],

			[static::ATTR_DATE_CREATE, DateValidator::class, DateValidator::ATTR_FORMAT => DateValidator::FORMAT_DATATIM]
		];
	}

	/**
	 * {@inheritdoc}
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function attributeLabels(): array
	{
		return [
			static::ATTR_ID             => 'id',
			static::ATTR_SIZE           => 'Размер файла в байтах',
			static::ATTR_NAME           => 'Имя файла',
			static::ATTR_ORIGINAL_NAME  => 'Оригинальное имя файла',
			static::ATTR_DIR            => 'Директория в которой хранится файл',
			static::ATTR_DATE_CREATE    => 'Дата создания записи в БД',
		];
	}

	/**
	 * {@inheritdoc}
	 * @return FileQuery the active query used by this AR class.
	 *
	 * @author Maxim Podberezhskiy
	 */
	public static function find(): FileQuery
	{
		return new FileQuery(get_called_class());
	}

	/**
	 * После удаления модели из базы удаляет файл и его директорию
	 *
	 * @return void
	 */
	public function afterDelete(): void
	{
		$path = FileService::getUploadDir() . $this->dir . '/'. $this->name;

		FileHelper::unlink($path);

		parent::afterDelete();
	}
}