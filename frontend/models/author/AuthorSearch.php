<?php

namespace frontend\models\author;

use common\models\db\Authors;
use common\yii\validators\IntegerValidator;

use frontend\models\response\Response;

use yii\base\Model;

/**
 * Class AuthorSearch
 * @package frontend\models\author
 * @author Maxim Podberezhskiy
 */
class AuthorSearch extends Model
{
	/** @var int */
	public $id;
	const ATTR_ID = 'id';

	/**
	 * Чтобы строка поиска выглядела красиво - возвращаем пустую строку
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public function formName(): string
	{
		return '';
	}

	/**
	 * @return array
	 * @author Maxim Podberezhskiy
	 */
	public function rules(): array
	{
		return [
			[static::ATTR_ID, IntegerValidator::class],
		];
	}

	/**
	 * @param string $id
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function searchById(string $id): Response {
		$query = Authors::find();

		$this->id = $id;

		$response = new Response();

		if (!$this->validate()) {
			$response->code = Response::CODE_ERROR;
			$response->message = $this->getErrors();
		} else {
			if ($this->id) {
				$query->andWhere(['=', Authors::TABLE_NAME . '.' . Authors::ATTR_ID, $this->id]);
			}

			if ($author = $query->one()) {
				$response->code = Response::CODE_OK;
				$response->result = (new CreateAuthorModelService())->createAuthor($author);
			} else {
				$response = $this->notFoundResponse();
			}
		}

		return $response;
	}

	/**
	 * Response ответ о том что автор не был найден
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function notFoundResponse(): Response
	{
		$response = new Response();

		$response->code     = Response::CODE_NOT_FOUND;
		$response->result   = null;
		$response->message  = 'Автор не найден';

		return $response;
	}
}