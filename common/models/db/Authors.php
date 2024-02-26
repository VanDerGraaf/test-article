<?php

namespace common\models\db;

use common\models\queries\AuthorsQuery;
use common\yii\validators\DateValidator;
use common\yii\validators\IntegerValidator;
use common\yii\validators\RequiredValidator;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;
use common\yii\validators\UniqueValidator;

use yii\db\ActiveRecord;

/**
 * Class Authors
 * @package common\models\db
 *
 * @property int $id
 * @property string $fio
 * @property string $year
 * @property string $biography
 *
 * @author Maxim Podberezhskiy
 */
class Authors extends ActiveRecord
{
	const TABLE_NAME = 'authors';

	const ATTR_ID           = 'id';
	const ATTR_FIO          = 'fio';
	const ATTR_YEAR         = 'year';
	const ATTR_BIOGRAPHY    = 'biography';

	/**
	 * Наименование таблицы
	 *
	 * @return string
	 *
	 * @author Maxim Podberezhskiy
	 */
	public static function tableName(): string
	{
		return static::TABLE_NAME;
	}

	/**
	 * @return array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function rules()
	{
		return [
			[static::ATTR_ID, IntegerValidator::class],
			[static::ATTR_ID, UniqueValidator::class],

			[static::ATTR_YEAR, DateValidator::class, DateValidator::ATTR_FORMAT => DateValidator::DEFAULT_FORMAT],

			[static::ATTR_FIO, TrimValidator::class],
			[static::ATTR_FIO, RequiredValidator::class],
			[static::ATTR_FIO, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],

			[static::ATTR_BIOGRAPHY, TrimValidator::class],
			[static::ATTR_BIOGRAPHY, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH_1000],
		];
	}

	/**
	 * Наименование атрибутов
	 * @return string[]
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function attributeLabels(): array
	{
		return [
			static::ATTR_ID         => 'ID записи',
			static::ATTR_YEAR       => 'Год рождения',
			static::ATTR_FIO        => 'ФИО',
			static::ATTR_BIOGRAPHY  => 'Биография',
		];
	}


	/**
	 * @return AuthorsQuery
	 * @author Maxim Podberezhskiy
	 */
	public static function find(): AuthorsQuery
	{
		return new AuthorsQuery(get_called_class());
	}
}