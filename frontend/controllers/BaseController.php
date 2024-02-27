<?php

namespace frontend\controllers;

use common\yii\web\ControllerRoutesTrait;

use frontend\models\response\Response;

use yii\rest\Controller;

/**
 * Class BaseController
 * @package frontend\controllers
 * @author Maxim Podberezhskiy
 */
class BaseController extends Controller
{
	use ControllerRoutesTrait;

	const ATTR_ID    = 'id';

	/**
	 * @return \yii\web\Response
	 * @author Maxim Podberezhskiy
	 */
	public function actionError()
	{
		$response = new Response();
		$response->code = Response::CODE_NOT_FOUND;

		return $this->asJson($response);
	}
}