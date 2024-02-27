<?php

namespace frontend\models\article;

use common\models\db\Articles;
use common\models\db\Authors;
use common\models\db\Categories;
use common\yii\validators\IntegerValidator;
use common\yii\validators\StringValidator;
use common\yii\validators\TrimValidator;

use frontend\models\pagination\PaginationItem;
use frontend\models\response\Response;

use yii\base\Model;

/**
 * Class ArticleSearch
 * @package frontend\models\article
 * @author Maxim Podberezhskiy
 */
class ArticleSearch extends Model
{
	public $id;
	const ATTR_ID = 'id';

	/** @var string $title - Название статьи */
	public $title;
	const ATTR_TITLE = 'title';

	/** @var string $category - Категория статьи */
	public $category;
	const ATTR_CATEGORY = 'category';

	/** @var string $author - Автор статьи */
	public $author;
	const ATTR_AUTHOR = 'author';

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

			[static::ATTR_TITLE, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_TITLE, TrimValidator::class],

			[static::ATTR_CATEGORY, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_CATEGORY, TrimValidator::class],

			[static::ATTR_AUTHOR, StringValidator::class, StringValidator::ATTR_MAX => StringValidator::VARCHAR_LENGTH],
			[static::ATTR_AUTHOR, TrimValidator::class],
		];
	}

	/**
	 * Поиск персон по атрибутам Articles
	 *
	 * @param array|null $params
	 * @return Response
	 */
	public function search(array $params = null): Response
	{
		$query = Articles::find();
		$query->joinWith(Articles::RELATION_FILE);
		$query->joinWith(Articles::RELATION_AUTHOR);
		$query->joinWith(Articles::RELATION_CATEGORIES);

		$this->load($params);

		$response = new Response();


		if ($this->validate()) {
			$query->andFilterWhere(['like', 'LOWER(' . Articles::TABLE_NAME . '.' . Articles::ATTR_TITLE .')', $this->title]);
			$query->andFilterWhere(['like', 'LOWER(' . Authors::TABLE_NAME . '.' . Authors::ATTR_FIO .')', $this->author]);
			$query->andFilterWhere(['like', 'LOWER(' . Categories::TABLE_NAME . '.' . Categories::ATTR_DESCRIPTION .')', $this->category]);

			$search_result = new ArticlesSearchResult($query);

			$response->result = $search_result->items;
			$response->pagination = new PaginationItem($search_result->pagination);

			/** Если ничего не нашли - возвращаем 404 код Not Found */
			if (empty($search_result->items)) {
				$response = $this->notFoundResponse();
			}
		} else { /** Если валидация не прошла - возвращаем 500 код и список ошибок */
			$response->code   = Response::CODE_ERROR;
			$response->result = null;

			/** Выводим сообщения о непровалидированных атрибутах */
			$response->message = $this->getErrors();
		}

		return $response;
	}

	/**
	 * @param string $id
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function searchById(string $id): Response {
		$query = Articles::find();

		$this->id = $id;

		$response = new Response();

		if (!$this->validate()) {
			$response->code = Response::CODE_ERROR;
			$response->message = $this->getErrors();
		} else {
			if ($this->id) {
				$query->andWhere(['=', Articles::TABLE_NAME . '.' . Articles::ATTR_ID, $this->id]);
			}

			if ($article = $query->one()) {
				$response->code = Response::CODE_OK;
				$response->result = (new CreateArticleModelService())->createArticle($article);
			} else {
				$response =$this->notFoundResponse();
			}
		}

		return $response;
	}

	/**
	 * Response ответ о том что статья не была найдена
	 * @return Response
	 * @author Maxim Podberezhskiy
	 */
	public function notFoundResponse(): Response
	{
		$response = new Response();

		$response->code     = Response::CODE_NOT_FOUND;
		$response->result   = null;
		$response->message  = 'Статья не найдена';

		return $response;
	}
}