<?php

namespace frontend\models\search;

use frontend\models\pagination\PaginationItem;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\ActiveRecordInterface;
use yii\data\Pagination;

/**
 * Базовый класс для данные поиска
 * С пагинацией
 */
abstract class SearchResult
{
	/**
	 * Элементы
	 *
	 * @var array SearchItemInterface[]
	 */
	public $items;

	/** @var Pagination Пагинация */
	public $pagination;

	/**
	 * Конструктор
	 *
	 * @param ActiveQuery $query
	 * @param int $pageSize
	 */
	public function __construct(ActiveQuery $query)
	{
		$this->pagination = new Pagination( [
			'totalCount' => $query->count(),
            'pageSizeLimit' => [1, 1000],
            'defaultPageSize' => PaginationItem::LIMIT
		]);
		$result = $query->offset($this->pagination->offset)
			->limit($this->pagination->limit)
			->all();

		foreach ($result as $item) {
			/** @var SearchItemInterface $item */
			$this->items[] = $this->createModel($item);
		}
	}

	/**
	 * Создание элемента данных поиска
	 *
	 * @param ActiveRecord $dbModel
	 * @return SearchItemInterface
	 */
	abstract public function createModel(ActiveRecordInterface $dbModel): SearchItemInterface;
}