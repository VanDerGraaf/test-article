<?php

namespace frontend\models\author;

use common\models\db\Authors;

use frontend\models\search\SearchItemInterface;

/**
 * Class AuthorsItem
 * @package frontend\models\author
 * @author Maxim Podberezhskiy
 */
class AuthorsItem  implements SearchItemInterface
{
	/** @var int */
	public $id;

	/** @var string */
	public $fio;

	/** @var string */
	public $year;

	/** @var string */
	public $biography;


	/**
	 * Обязательный параметр Authors AR объект
	 * Заполняем AuthorsItem данными из Authors AR
	 *
	 * AuthorsItem constructor.
	 * @param Authors $author
	 * @throws \yii\base\InvalidConfigException
	 */
	public function __construct(Authors $author)
	{
		$this->id           = $author->id;
		$this->fio          = $author->fio;
		$this->year         = \Yii::$app->formatter->asDate($author->year, 'php:Y');
		$this->biography    = $author->biography;

		return $this;
	}
}