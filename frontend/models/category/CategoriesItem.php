<?php

namespace frontend\models\category;

use common\models\db\Categories;

use frontend\models\search\SearchItemInterface;

class CategoriesItem implements SearchItemInterface
{
	/** @var int */
	public $id;

	/** @var string */
	public $description;

	/** @var CategoryItem[] */
	public $children;

	/**
	 * Обязательный параметр Authors AR объект
	 * Заполняем AuthorsItem данными из Authors AR
	 *
	 * AuthorsItem constructor.
	 * @param Categories $category
	 * @throws \yii\base\InvalidConfigException
	 */
	public function __construct(Categories $category)
	{
		$this->id           = $category->id;
		$this->description  = $category->description;
		if (null !== $category->children) {
			$this->children = $this->setChildren($category);
		}

		return $this;
	}

	private function setChildren(Categories $node)
	{
		if ($node === null) {
			return false;
		}

		$result = null;
		$items = null;
		$children = null;
		if ($node->children) {
			foreach ($node->children as $child) {
				$items[] = new CategoryItem($child);
			}
		}
		$result = $items;

		return $result;
	}
}