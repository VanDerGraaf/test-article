<?php

namespace frontend\models\article;

use common\models\db\Articles;

class CreateArticleModelService
{
	/**
	 * @param Articles $article
	 * @return ArticleItem
	 * @author Maxim Podberezhskiy
	 */
	public function createArticle(Articles $article)
	{
		return new ArticleItem($article);
	}
}