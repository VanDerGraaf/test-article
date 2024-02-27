<?php

namespace frontend\models\author;

use common\models\db\Authors;

use frontend\models\search\SearchItemInterface;

/**
 * Class AuthorItem
 * @package frontend\models\author
 * @author Maxim Podberezhskiy
 */
class AuthorItem extends AuthorsItem implements SearchItemInterface
{
	/**
	 * AuthorItem constructor.
	 * @param Authors $author
	 * @return AuthorItem
	 */
	public function __construct(Authors $author)
	{
		parent::__construct($author);
		return $this;
	}
}