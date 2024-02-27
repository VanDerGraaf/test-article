<?php

namespace frontend\models\article;

use common\models\db\Articles;
use common\models\db\Categories;
use common\models\services\FileService;

use frontend\models\search\SearchItemInterface;

/**
 * Class ArticlesItem
 * @package frontend\models\article
 * @author Maxim Podberezhskiy
 */
class ArticlesItem implements SearchItemInterface
{
	/** @var int */
	public $id;

	/** @var string */
	public $title;

	/** @var string */
	public $anons;

	/** @var string */
	public $text;

	/** @var string */
	public $author;

	/** @var string[]  */
	public $categories;

	/** @var string|null */
	public $img;

	/** @var string|null  */
	public $img_prev;

	/**
	 * Обязательный параметр Articles AR объект
	 * Заполняем ArticlesItem данными из Articles AR
	 *
	 * ArticlesItem constructor.
	 * @param Articles $article
	 * @return ArticlesItem
	 */
	public function __construct(Articles $article)
	{
		$this->id       = $article->id;
		$this->title    = $article->title;
		$this->anons    = $article->anons;
		$this->text     = $article->text;
		$this->author   = $article->author->fio;

		if (!empty($article->categories)) {
			$this->categories = $this->setCategories($article->categories);
		}

		if (!empty($article->file_id)) {
			$this->img      = FileService::getPath($article->file);
			$this->img_prev = FileService::generatePrevImg($article->file);
		}

		return $this;
	}

	/**
	 * @param Categories[] $categories
	 * @return string[]
	 * @author Maxim Podberezhskiy
	 */
	private function setCategories(array $categories): array
	{
		$result = [];
		foreach ($categories as $category) {
			array_push($result, $category->description);
		}
		return $result;
	}
}