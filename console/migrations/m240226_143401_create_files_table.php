<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m240226_143401_create_files_table extends Migration
{
	const TABLE_NAME = 'files';
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable(static::TABLE_NAME, [
			'id'            => $this->primaryKey(),
			'size'          => $this->bigInteger()->notNull()->comment('Размер файла в байтах'),
			'name'          => $this->string(255)->notNull()->comment('Имя файла'),
			'original_name' => $this->string(255)->notNull()->comment('Оригинальное имя файла'),
			'dir'           => $this->string(255)->notNull()->comment('Директория в которой хранится файл'),
			'date_create'   => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания записи в БД')
		]);

		$this->addCommentOnTable(static::TABLE_NAME, 'Файлы');
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable(static::TABLE_NAME);
	}
}
