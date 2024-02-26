<?php

namespace common\models\queries;

use common\models\db\Articles;

use yii\db\ActiveQuery;

class ArticlesQuery extends ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Articles[]|array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function all($db = null): array
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Articles|array|null
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function one($db = null): Articles|array|null
	{
		return parent::one($db);
	}
}