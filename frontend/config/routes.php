<?php

use frontend\controllers\ArticleController;

return [
	"articles/search"           => ArticleController::routeId(ArticleController::ACTION_INDEX),
	"articles/search/<id:\d>"   => ArticleController::routeId(ArticleController::ACTION_FIND_BY_TITLE),
];
