<?php

namespace frontend\controllers;

use frontend\models\article\ArticleSearch;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class ArticleController extends BaseController
{
	const ACTION_INDEX              = 'index';
	const ACTION_FIND_BY_ID      = 'find-by-id';

	/**
	 * Поиск статей с поддержкой GET параметров
	 *
	 * @return \yii\web\Response
	 */
	public function actionIndex(): \yii\web\Response
	{
		return $this->asJson((new ArticleSearch())->search(Yii::$app->request->queryParams));
	}

	/**
	 * Поиск статьи по id
	 * @param string $id
	 * @return \yii\web\Response
	 * @author Maxim Podberezhskiy
	 */
	public function actionFindById(string $id): \yii\web\Response
	{
		return $this->asJson((new ArticleSearch())->searchById($id));
	}
}