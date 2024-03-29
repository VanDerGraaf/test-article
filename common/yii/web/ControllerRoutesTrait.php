<?php

namespace common\yii\web;

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * Trait ControllerRoutesTrait
 * @package common\yii\web
 */
trait ControllerRoutesTrait
{
	/**
	 * Получение маршрута на указанное действие с указанными параметрами.
	 *
	 * @param string $action Название действия
	 * @param array  $params Дополнительные параметры
	 *
	 * @return array
	 *
	 * @author Maxim Podberezhskiy
	 */
	public static function getUrlRoute(string $action, array $params = []): array
	{
		$path = static::routeId($action);

		return array_merge(['/' . $path], $params);
	}

	/**
	 * Getting route id, can be passed to routes
	 *
	 * @param string $action
	 *
	 * @return string
	 *
	 * @author Maxim Podberezhskiy
	 */
	public static function routeId(string $action): string
	{
		preg_match('#\\\\modules\\\\(?P<module>.+?)\\\\#', static::class, $matches);
		$module = ($matches['module'] ?? null);

		$controller = StringHelper::basename(static::class);
		$controller = preg_replace('/Controller$/', '', $controller);
		$controller = Inflector::camel2id($controller);
		$path       = implode('/', array_filter([$module, $controller, $action]));

		return $path;
	}
}