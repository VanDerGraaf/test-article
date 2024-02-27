<?php

namespace frontend\models\author;

use common\models\db\Authors;

/**
 * Class CreateAuthorModelService
 * @package frontend\models\author
 * @author Maxim Podberezhskiy
 */
class CreateAuthorModelService
{
	/**
	 * @param Authors $author
	 * @return AuthorItem
	 * @author Maxim Podberezhskiy
	 */
	public function createAuthor(Authors $author): AuthorItem
	{
		return new AuthorItem($author);
	}
}