<?php

use frontend\controllers\ArticleController;
use frontend\controllers\AuthorController;

return [
	"articles/search"           => ArticleController::routeId(ArticleController::ACTION_INDEX),
	"articles/search/<id:\d+>"   => ArticleController::routeId(ArticleController::ACTION_FIND_BY_ID),

	"author/search/<id:\d+>"   => AuthorController::routeId(AuthorController::ACTION_FIND_BY_ID),
];
