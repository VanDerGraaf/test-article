<?php

namespace common\models\queries;

use common\models\db\CategoriesToArticle;

use yii\db\ActiveQuery;

class CategoriesToArticleQuery extends ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return CategoriesToArticle[]|array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function all($db = null): array
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return CategoriesToArticle|array|null
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function one($db = null): CategoriesToArticle|array|null
	{
		return parent::one($db);
	}
}