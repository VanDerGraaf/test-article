<?php

use yii\web\JsonParser;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
	    'request' => [
		    'csrfParam' => '_csrf-api',
		    'parsers' => [
			    'application/json' => JsonParser::class,
		    ],
	    ],
	    'response' => [
		    'formatters' => [
			    Response::FORMAT_JSON => [
				    'class' => JsonResponseFormatter::class,
				    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
			    ],
		    ],
	    ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
	        'errorAction' => 'base/error',
        ],
	    'urlManager' => [
		    'enablePrettyUrl'     => true,
		    'showScriptName'      => false,
		    'enableStrictParsing' => true,
		    'rules' => array_merge(
			    require __DIR__ . '/routes.php'
		    )
	    ],
    ],
    'params' => $params,
];
