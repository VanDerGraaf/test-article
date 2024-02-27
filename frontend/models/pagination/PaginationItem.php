<?php

namespace frontend\models\pagination;

use yii\data\Pagination;

/**
 * Class PaginationItem
 */
class PaginationItem
{
	/**
	 * @var int Страница
	 */
	public $page;

	/**
	 * @var int Кол-во данных
	 */
	public $per_page;

	/**
	 * @var int Кол-во страниц
	 */
	public $page_count;

	/**
	 * @var int Всего данных
	 */
	public $total_count;

	/**
	 * @var array|string[] Ссылки
	 */
	public $links;

	/**
	 * Кол-во данных
	 */
	const LIMIT = 10;

	/**
	 * PaginationItem constructor.
	 * @param Pagination $pagination
	 */
	public function __construct(Pagination $pagination)
	{
		$this->page         = $pagination->getPage() + 1;
		$this->per_page     = $pagination->pageSize;
		$this->page_count   = $pagination->pageCount;
		$this->total_count  = $pagination->totalCount;
		$this->links        = $pagination->getLinks();
	}
}