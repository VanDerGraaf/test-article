<?php

namespace common\models\db;

use common\models\queries\CategoriesToArticleQuery;
use common\yii\validators\ExistValidator;
use common\yii\validators\IntegerValidator;
use common\yii\validators\UniqueValidator;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class CategoriesToArticle
 * @package common\models\db
 * @property int $id
 * @property int $category_id
 * @property int $article_id
 *
 * @property Categories $category
 * @property Articles $article
 *
 * @author Maxim Podberezhskiy
 */
class CategoriesToArticle extends ActiveRecord
{
	const TABLE_NAME = 'category_to_article';

	const ATTR_ID           = 'id';
	const ATTR_CATEGORY_ID  = 'category_id';
	const ATTR_ARTICLE_ID   = 'article_id';

	const RELATION_CATEGORY = 'category';
	const RELATION_ARTICLE  = 'article';

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

			[static::ATTR_CATEGORY_ID, IntegerValidator::class],
			[
				static::ATTR_CATEGORY_ID,
				ExistValidator::class,
				ExistValidator::ATTR_TARGET_CLASS => Categories::class,
				ExistValidator::ATTR_TARGET_ATTRIBUTE => Categories::ATTR_ID
			],

			[static::ATTR_ARTICLE_ID, IntegerValidator::class],
			[
				static::ATTR_ARTICLE_ID,
				ExistValidator::class,
				ExistValidator::ATTR_TARGET_CLASS => Articles::class,
				ExistValidator::ATTR_TARGET_ATTRIBUTE => Articles::ATTR_ID
			],

		];
	}

	/**
	 * {@inheritdoc}
	 * @return CategoriesToArticleQuery the active query used by this AR class.
	 *
	 * @author Maxim Podberezhskiy
	 */
	public static function find(): CategoriesToArticleQuery
	{
		return new CategoriesToArticleQuery(get_called_class());
	}

	/**
	 * @return ActiveQuery
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function getCategory(): ActiveQuery
	{
		return $this->hasOne(Categories::class, [Categories::ATTR_ID => static::ATTR_CATEGORY_ID]);
	}

	/**
	 * @return ActiveQuery
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function getArticle(): ActiveQuery
	{
		return $this->hasOne(Articles::class, [Articles::ATTR_ID => static::ATTR_ARTICLE_ID]);
	}
}