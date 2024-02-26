<?php

namespace common\models\db;

use common\models\queries\CategoriesQuery;
use common\yii\validators\ExistValidator;
use common\yii\validators\IntegerValidator;
use common\yii\validators\RequiredValidator;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;
use common\yii\validators\UniqueValidator;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Categories
 * @package common\models\db
 *
 * @property int $id
 * @property string $description
 * @property int $parent_id
 *
 * @property Categories $parent
 *
 * @author Maxim Podberezhskiy
 */
class Categories extends ActiveRecord
{
	const TABLE_NAME = 'categories';

	const ATTR_ID           = 'id';
	const ATTR_DESCRIPTION  = 'description';
	const ATTR_PARENT_ID    = 'parent_id';

	const RELATION_PARENT = 'parent';

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

			[static::ATTR_DESCRIPTION, TrimValidator::class],
			[static::ATTR_DESCRIPTION, RequiredValidator::class],
			[static::ATTR_DESCRIPTION, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],

			[static::ATTR_PARENT_ID, IntegerValidator::class],
			[
				static::ATTR_PARENT_ID,
				ExistValidator::class,
				ExistValidator::ATTR_TARGET_CLASS => Categories::class,
				ExistValidator::ATTR_TARGET_ATTRIBUTE => Categories::ATTR_ID
			],
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
			static::ATTR_ID             => 'ID записи',
			static::ATTR_DESCRIPTION    => 'Описание',
			static::ATTR_PARENT_ID      => 'Родительский ID',
		];
	}


	/**
	 * @return ActiveQuery
	 * @author Maxim Podberezhskiy
	 */
	public static function find(): ActiveQuery
	{
		return new CategoriesQuery(get_called_class());
	}

	/**
	 * @return ActiveQuery
	 * @author Maxim Podberezhskiy
	 */
	public function getParent(): ActiveQuery
	{
		return $this->hasOne(Categories::Class, [Categories::ATTR_ID => Categories::ATTR_PARENT_ID]);
	}
}