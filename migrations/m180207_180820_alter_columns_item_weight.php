<?php

use yii\db\Migration;

/**
 * Class m180207_180820_alter_columns_item_weight
 */
class m180207_180820_alter_columns_item_weight extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function safeUp()
	{
		$this->alterColumn('Item', 'weight', $this->decimal(10, 2)->defaultValue(0.00));
	}

	/**
	 * @inheritdoc
	 */
	public function safeDown()
	{
		$this->alterColumn('Item', 'weight', $this->decimal(4, 2)->defaultValue(0.00));
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180207_180820_alter_columns_item_weight cannot be reverted.\n";

		return false;
	}
	*/
}
