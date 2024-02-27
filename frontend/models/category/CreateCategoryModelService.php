<?php

namespace frontend\models\category;

use common\models\db\Categories;

class CreateCategoryModelService
{
	/**
	 * @param Categories $article
	 * @return CategoryItem
	 * @author Maxim Podberezhskiy
	 */
	public function createCategory(Categories $article)
	{
		return new CategoryItem($article);
	}
}