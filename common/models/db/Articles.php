<?php


namespace common\models\db;

use common\models\queries\ArticlesQuery;
use common\yii\validators\ExistValidator;
use common\yii\validators\IntegerValidator;
use common\yii\validators\RequiredValidator;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;
use common\yii\validators\UniqueValidator;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Articles
 * @package common\models\db
 *
 * @property int $id
 * @property int $title
 * @property int $file_id
 * @property int $anons
 * @property int $text
 * @property int $author_id
 *
 * @property Files $file
 * @property Authors $author
 * @property Categories[] $categories
 *
 * @author Maxim Podberezhskiy
 */
class Articles extends ActiveRecord
{
	const TABLE_NAME = 'articles';

	const ATTR_ID           = 'id';
	const ATTR_TITLE        = 'title';
	const ATTR_FILE_ID      = 'file_id';
	const ATTR_ANONS        = 'anons';
	const ATTR_TEXT         = 'text';
	const ATTR_AUTHOR_ID    = 'author_id';

	const RELATION_FILE         = 'file';
	const RELATION_AUTHOR       = 'author';
	const RELATION_CATEGORIES   = 'categories';


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

			[static::ATTR_TITLE, TrimValidator::class],
			[static::ATTR_TITLE, RequiredValidator::class],
			[static::ATTR_TITLE, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],

			[static::ATTR_ANONS, TrimValidator::class],
			[static::ATTR_ANONS, RequiredValidator::class],
			[static::ATTR_ANONS, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],

			[static::ATTR_TEXT, TrimValidator::class],
			[static::ATTR_TEXT, RequiredValidator::class],
			[static::ATTR_TEXT, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH_1000],

			[static::ATTR_FILE_ID, IntegerValidator::class],
			[
				static::ATTR_FILE_ID,
				ExistValidator::class,
				ExistValidator::ATTR_TARGET_CLASS => Files::class,
				ExistValidator::ATTR_TARGET_ATTRIBUTE => Files::ATTR_ID
			],

			[static::ATTR_AUTHOR_ID, RequiredValidator::class],
			[static::ATTR_AUTHOR_ID, IntegerValidator::class],
			[
				static::ATTR_AUTHOR_ID,
				ExistValidator::class,
				ExistValidator::ATTR_TARGET_CLASS => Authors::class,
				ExistValidator::ATTR_TARGET_ATTRIBUTE => Authors::ATTR_ID
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
			static::ATTR_ID         => 'ID записи',
			static::ATTR_TITLE      => 'Название',
			static::ATTR_ANONS      => 'Анонс',
			static::ATTR_TEXT       => 'Текст',
			static::ATTR_FILE_ID    => 'Файл ID',
			static::ATTR_AUTHOR_ID  => 'Автор ID',
		];
	}


	/**
	 * @return ArticlesQuery
	 * @author Maxim Podberezhskiy
	 */
	public static function find(): ArticlesQuery
	{
		return new ArticlesQuery(get_called_class());
	}

	/**
	 * @return ActiveQuery
	 * @author Maxim Podberezhskiy
	 */
	public function getFile(): ActiveQuery
	{
		return $this->hasOne(Files::Class, [Files::ATTR_ID => static::ATTR_FILE_ID]);
	}

	/**
	 * @return ActiveQuery
	 * @author Maxim Podberezhskiy
	 */
	public function getAuthor(): ActiveQuery
	{
		return $this->hasOne(Authors::Class, [Authors::ATTR_ID => static::ATTR_AUTHOR_ID]);
	}

	/**
	 * @return ActiveQuery
	 * @throws \yii\base\InvalidConfigException
	 * @author Maxim Podberezhskiy
	 */
	public function getCategories(): ActiveQuery
	{
		return $this->hasMany(Categories::class, [Categories::ATTR_ID => CategoriesToArticle::ATTR_CATEGORY_ID])
			->viaTable(CategoriesToArticle::TABLE_NAME, [CategoriesToArticle::ATTR_ARTICLE_ID => static::ATTR_ID]);
	}
}