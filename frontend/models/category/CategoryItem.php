<?php

namespace frontend\models\category;

use common\models\db\Categories;

use frontend\models\search\SearchItemInterface;

/**
 * Class CategoryItem
 * @package frontend\models\category
 * @author Maxim Podberezhskiy
 */
class CategoryItem extends CategoriesItem implements SearchItemInterface
{
	/**
	 * CategoryItem constructor.
	 * @param Categories $category
	 * @return CategoryItem
	 */
	public function __construct(Categories $category)
	{
		parent::__construct($category);
		return $this;
	}
}