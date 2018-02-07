<?php

use yii\db\Migration;

/**
 * Class m180207_180612_alter_columns_supply__item_cost_count
 */
class m180207_180612_alter_columns_supply__item_cost_count extends Migration
{
    /**
     * @inheritdoc
     */
	public function safeUp()
	{
		$this->alterColumn('Supply__Item', 'count', $this->decimal(10,2)->defaultValue(0.00));
		$this->alterColumn('Supply__Item', 'cost', $this->decimal(10,4)->defaultValue(0.0000));
	}

	/**
	 * @inheritdoc
	 */
	public function safeDown()
	{
		$this->alterColumn('Supply__Item', 'count', $this->float()->defaultValue(0));
		$this->alterColumn('Supply__Item', 'cost', $this->float()->defaultValue(0));
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_180612_alter_columns_supply__item_cost_count cannot be reverted.\n";

        return false;
    }
    */
}
