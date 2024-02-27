<?php

namespace frontend\models\category;

use common\models\db\Categories;
use common\yii\validators\IntegerValidator;

use frontend\models\response\Response;

use yii\base\Model;

/**
 * Class CategorySearch
 * @package frontend\models\category
 * @author Maxim Podberezhskiy
 */
class CategorySearch extends Model
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
	public function searchById(string $id): Response
	{
		$query = Categories::find();

		$this->id = $id;

		$response = new Response();

		if (!$this->validate()) {
			$response->code = Response::CODE_ERROR;
			$response->message = $this->getErrors();
		} else {
			if ($this->id) {
				$query->andWhere(['=', Categories::TABLE_NAME . '.' . Categories::ATTR_ID, $this->id]);
			}

			if ($category = $query->one()) {
				$response->code = Response::CODE_OK;
				$response->result = (new CreateCategoryModelService())->createCategory($category);
			} else {
				$response = $this->notFoundResponse();
			}
		}

		return $response;
	}

	/**
	 * Response ответ о том что категория не была найдена
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function notFoundResponse(): Response
	{
		$response = new Response();

		$response->code     = Response::CODE_NOT_FOUND;
		$response->result   = null;
		$response->message  = 'Категория не найдена';

		return $response;
	}
}