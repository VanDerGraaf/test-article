<?php

namespace frontend\controllers;

use frontend\models\category\CategorySearch;

/**
 * Class CategoryController
 * @package frontend\controllers
 * @author Maxim Podberezhskiy
 */
class CategoryController extends BaseController
{
	const ACTION_FIND_BY_ID      = 'find-by-id';

	/**
	 * Поиск статьи по id
	 * @param string $id
	 * @return \yii\web\Response
	 * @author Maxim Podberezhskiy
	 */
	public function actionFindById(string $id): \yii\web\Response
	{
		return $this->asJson((new CategorySearch())->searchById($id));
	}
}