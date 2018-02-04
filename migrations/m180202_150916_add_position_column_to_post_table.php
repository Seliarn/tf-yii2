<?php

use yii\db\Migration;

/**
 * Handles adding position to table `post`.
 */
class m180202_150916_add_position_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('Item', 'ingredients_losses_clear', $this->integer());
        $this->addColumn('Item', 'ingredients_losses_cook', $this->integer());
        $this->addColumn('Item', 'ingredients_losses_fry', $this->integer());
        $this->addColumn('Item', 'ingredients_losses_stew', $this->integer());
        $this->addColumn('Item', 'ingredients_losses_bake', $this->integer());

		$this->createTable('news', [
			'id' => Schema::TYPE_PK,
			'title' => Schema::TYPE_STRING . ' NOT NULL',
			'ingredients_losses_clear' => Schema::TYPE_TEXT,
			'ingredients_losses_cook' => Schema::TYPE_TEXT,
			'ingredients_losses_fry' => Schema::TYPE_TEXT,
			'ingredients_losses_stew' => Schema::TYPE_TEXT,
			'ingredients_losses_bake' => Schema::TYPE_TEXT,
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('post', 'position');
    }
}