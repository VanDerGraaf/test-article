<?php

namespace frontend\models\response;

use frontend\models\pagination\PaginationItem;

/**
 * Модель ответа сервера
 * @author Maxim Podberezhskiy
 */
class Response
{
	/**
	 * Код ответа сервера
	 * @var int
	 */
	public $code = self::CODE_OK;

	/**
	 * Результат ответа. Может хранить любой массив/объект
	 * @var mixed
	 */
	public $result;

	/**
	 * Произвольное сообщение
	 * @var string
	 */
	public $message;

	/**
	 * Пагинация
	 * @var PaginationItem
	 */
	public $pagination;

	/**
	 * Успешный запрос
	 */
	const CODE_OK = 200;

	/**
	 * Не найдено
	 */
	const CODE_NOT_FOUND = 404;

	/**
	 * Не авторизирован
	 */
	const CODE_UNAUTHORIZED = 401;

	/**
	 * Ошибка сервера
	 */
	const CODE_ERROR = 500;
}