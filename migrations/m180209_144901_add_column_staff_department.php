<?php

use yii\db\Migration;

/**
 * Class m180209_144901_add_column_staff_department
 */
class m180209_144901_add_column_staff_department extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$this->addColumn('Staff_Department', 'created', $this->integer(11)->defaultValue(0));
		$this->addColumn('Staff_Department', 'updated', $this->integer(11)->defaultValue(0));

	}

	/**
	 * @inheritdoc
	 */
	public function down()
	{
		$this->dropColumn('Staff_Department', 'created');
		$this->dropColumn('Staff_Department', 'updated');
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180209_144901_add_column_staff_department cannot be reverted.\n";

		return false;
	}
	*/
}
