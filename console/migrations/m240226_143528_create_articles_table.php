<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m240226_143528_create_articles_table extends Migration
{
	const TABLE_NAME = 'articles';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(static::TABLE_NAME, [
            'id'        => $this->primaryKey(),
	        'title'     => $this->string(255)->comment('Название'),
	        'file_id'   => $this->integer()->comment('ID файла'),
	        'anons'     => $this->string(255)->comment('Анонс'),
	        'text'      => $this->text()->notNull()->comment('Текст'),
	        'author_id' => $this->integer()->notNull()->comment('ID автора')
        ]);

	    $this->addForeignKey(
		    static::TABLE_NAME . '_file_id-files_id',
		    static::TABLE_NAME,
		    'file_id',
		    'files',
		    "id",
		    'CASCADE',
		    'CASCADE'
	    );

	    $this->addForeignKey(
		    static::TABLE_NAME . '_author_id-authors_id',
		    static::TABLE_NAME,
		    'author_id',
		    'authors',
		    "id",
		    'CASCADE',
		    'CASCADE'
	    );

	    $this->addCommentOnTable(static::TABLE_NAME, 'Статьи');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(static::TABLE_NAME);
    }
}
