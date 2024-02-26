<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m240226_142100_create_authors_table extends Migration
{
	const TABLE_NAME = 'authors';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(static::TABLE_NAME, [
            'id'        => $this->primaryKey(),
	        'fio'       => $this->string(255)->notNull()->comment('ФИО'),
	        'year'      => $this->date()->comment('Год рождения'),
	        'biography' => $this->text()->comment('Биография')
        ]);

        $this->addCommentOnTable(static::TABLE_NAME,'Авторы книг');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(static::TABLE_NAME);
    }
}
