<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_to_article}}`.
 */
class m240226_144115_create_category_to_article_table extends Migration
{
	const TABLE_NAME = 'category_to_article';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(static::TABLE_NAME, [
            'id'            => $this->primaryKey(),
	        'category_id'   => $this->integer()->notNull()->comment('ID категории'),
	        'article_id'    => $this->integer()->notNull()->comment('ID статьи'),
        ]);

	    $this->addForeignKey(
		    static::TABLE_NAME . '_category_id-categories_id',
		    static::TABLE_NAME,
		    'category_id',
		    'categories',
		    "id",
		    'CASCADE',
		    'CASCADE'
	    );

	    $this->addForeignKey(
		    static::TABLE_NAME . '_article_id-articles_id',
		    static::TABLE_NAME,
		    'article_id',
		    'articles',
		    "id",
		    'CASCADE',
		    'CASCADE'
	    );

	    $this->addCommentOnTable(static::TABLE_NAME, 'Категории статей');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(static::TABLE_NAME);
    }
}
