<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m240226_142636_create_categories_table extends Migration
{
	const TABLE_NAME = 'categories';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable(static::TABLE_NAME, [
			'id'            => $this->primaryKey(),
			'description'   => $this->text()->comment('Описание'),
			'parent_id'     => $this->integer()->null()->comment('Родительская категория')
		]);

		$this->addForeignKey(
			static::TABLE_NAME . '_parent_id-categories_id',
			static::TABLE_NAME,
			'parent_id',
			static::TABLE_NAME,
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
