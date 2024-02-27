<?php

namespace frontend\controllers;

use frontend\models\author\AuthorSearch;

use yii\web\Response;

/**
 * Class AuthorController
 * @package frontend\controllers
 * @author Maxim Podberezhskiy
 */
class AuthorController extends BaseController
{
	const ACTION_FIND_BY_ID      = 'find-by-id';

	/**
	 * Поиск статьи по id
	 * @param string $id
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function actionFindById(string $id): Response
	{
		return $this->asJson((new AuthorSearch())->searchById($id));
	}
}