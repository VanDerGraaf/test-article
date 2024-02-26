<?php

namespace common\models\queries;

use common\models\db\Files;

use yii\db\ActiveQuery;

/**
 * Class CategoriesQuery
 * @package common\models\queries
 * @author Maxim Podberezhskiy
 */
class FileQuery extends ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Files[]|array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function all($db = null): array
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Files|array|null
	 *
	 * @author Maxim Podberezhskiy
	 */
	public function one($db = null): Files|array|null
	{
		return parent::one($db);
	}
}