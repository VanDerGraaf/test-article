<?php

namespace frontend\models\article;

use common\models\db\Articles;

use frontend\models\search\SearchItemInterface;

/**
 * Модель статьи
 *
 * Class ArticleItem
 *
 * Наследуемся от базовой модели frontend\models\article\ArticlesItem
 * Переданный сюда единичный экземпляр AR Articles заполнит атрибуты ArticleItem
 *
 * @package frontend\models\article
 */
class ArticleItem extends ArticlesItem implements SearchItemInterface
{
	/**
	 * ArticleItem constructor.
	 * @param Articles $article
	 * @return ArticleItem
	 */
	public function __construct(Articles $article)
	{
		parent::__construct($article);
		return $this;
	}
}