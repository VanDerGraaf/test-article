<?php

namespace common\models\queries;

use common\models\db\Authors;

use yii\db\ActiveQuery;

/**
 * Class AuthorsQuery
 * @package common\models\queries
 * @author Maxim Podberezhskiy
 */
class AuthorsQuery extends ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Authors[]|array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function all($db = null): array
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Authors|array|null
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function one($db = null): Authors|array|null
	{
		return parent::one($db);
	}
}