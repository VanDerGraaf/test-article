<?php


namespace frontend\models\article;

use common\models\db\Articles;

use frontend\models\search\SearchResult;

use yii\db\ActiveRecordInterface;

class ArticlesSearchResult extends SearchResult
{
	/**
	 * @param ActiveRecordInterface $articles
	 * @return ArticleItem
	 * @author Maxim Podberezhskiy
	 */
	public function createModel(ActiveRecordInterface $articles): ArticleItem
	{
		/** Присваиваем здесь статью из AR - к базовой модели ArticleItem */
		return new ArticleItem($articles);
	}
}