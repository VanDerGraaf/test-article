<?php

use common\models\db\Articles;
use common\models\db\Authors;
use common\models\db\Categories;
use common\models\db\CategoriesToArticle;
use common\models\db\Files;
use yii\db\Migration;

/**
 * Class m240227_130412_fill_data
 */
class m240227_130412_fill_data extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->batchInsert(
			'categories',
			[
				Categories::ATTR_DESCRIPTION,
				Categories::ATTR_PARENT_ID
			],
			[
				['Категория1', null],
				['Категория2', null],
				['Категория3', null],
				['Категория4', 1],
				['Категория5', 2],
				['Категория6', 3],
				['Категория7', 1],
				['Категория8', 7],
				['Категория9', 7],
				['Категория10', 1],
			]
		);

		$this->batchInsert(
			'authors',
			[
				Authors::ATTR_FIO,
				Authors::ATTR_YEAR,
				Authors::ATTR_BIOGRAPHY,
			],
			[
				['Тестов Тест Тестович', '1872-12-12', 'Родился, жил и умер'],
				['Тестов Тест Тестович 2', '1882-12-10', 'Родился, жил и покушал'],
				['Тестов Тест Тестович 3', '1832-11-03', 'Родился, жил и поспал'],
				['Тестов Тест Тестович 4', '1822-03-04', 'Родился, жил и побегал'],
				['Тестов Тест Тестович 5', '1812-09-02', 'Родился, жил и почитал'],
			]
		);

		$this->batchInsert(
			'files',
			[
				Files::ATTR_SIZE,
				Files::ATTR_NAME,
				Files::ATTR_ORIGINAL_NAME,
				Files::ATTR_DIR,
			],
			[
				[100, 'test.jpg', 'test.jpg', 'ddd'],
				[100, 'test.jpg', 'test.jpg', 'sss'],
				[100, 'test.jpg', 'test.jpg', 'aaa'],
			]
		);

		$this->batchInsert(
			'articles',
			[
				Articles::ATTR_TITLE,
				Articles::ATTR_FILE_ID,
				Articles::ATTR_ANONS,
				Articles::ATTR_TEXT,
				Articles::ATTR_AUTHOR_ID,
			],
			[
				['Хорошая статья', 1, 'Хороший анонс', 'очень хороший текст статьи', 1],
				['Средняя статья', 2, 'Средний анонс', 'очень средний текст статьи', 2],
				['Плохая статья', 3, 'Плохой анонс', 'очень плохой текст статьи', 3]
			]
		);
		$this->batchInsert(
			'category_to_article',
			[
				CategoriesToArticle::ATTR_CATEGORY_ID,
				CategoriesToArticle::ATTR_ARTICLE_ID,
			],
			[
				[1, 1],
				[2, 1],
				[3, 1],
				[1, 2],
				[2, 2],
				[3, 2],
				[5, 3],
				[7, 3],
				[9, 3]
			]
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{

	}

}
