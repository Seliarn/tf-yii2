<?php

use yii\db\Migration;

/**
 * Class m180206_151333_alter_columns_item_losses
 */
class m180206_151333_alter_columns_item_losses extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		$this->alterColumn('Item', 'losses_clear', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Item', 'losses_cook', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Item', 'losses_fry', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Item', 'losses_stew', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Item', 'losses_bake', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Item', 'weight', $this->decimal(4,2)->defaultValue(0.00));
		$this->alterColumn('Supply', 'note', $this->string(255)->null()->defaultValue(null));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
		$this->alterColumn('Item', 'losses_clear', $this->integer(3)->defaultValue(0));
		$this->alterColumn('Item', 'losses_cook', $this->integer(3)->defaultValue(0));
		$this->alterColumn('Item', 'losses_fry', $this->integer(3)->defaultValue(0));
		$this->alterColumn('Item', 'losses_stew', $this->integer(3)->defaultValue(0));
		$this->alterColumn('Item', 'losses_bake', $this->integer(3)->defaultValue(0));
		$this->alterColumn('Item', 'weight', $this->integer(5)->defaultValue(0));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_151331_alter_columns_item_losses cannot be reverted.\n";

        return false;
    }
    */
}
