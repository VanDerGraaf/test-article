<?php

namespace common\models\queries;

use common\models\db\Categories;

use yii\db\ActiveQuery;

/**
 * Class CategoriesQuery
 * @package common\models\queries
 * @author Maxim Podberezhskiy
 */
class CategoriesQuery extends ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Categories[]|array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function all($db = null): array
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Categories|array|null
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function one($db = null): Categories|array|null
	{
		return parent::one($db);
	}
}