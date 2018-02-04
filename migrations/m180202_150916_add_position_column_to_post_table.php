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
        $this->addColumn('Item', 'losses_clear', $this->integer(3)->defaultValue(0));
        $this->addColumn('Item', 'losses_cook', $this->integer(3)->defaultValue(0));
        $this->addColumn('Item', 'losses_fry', $this->integer(3)->defaultValue(0));
        $this->addColumn('Item', 'losses_stew', $this->integer(3)->defaultValue(0));
        $this->addColumn('Item', 'losses_bake', $this->integer(3)->defaultValue(0));
        $this->addColumn('Item', 'weight', $this->integer(5)->defaultValue(0));

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('Item', 'losses_clear');
        $this->dropColumn('Item', 'losses_cook');
        $this->dropColumn('Item', 'losses_fry');
        $this->dropColumn('Item', 'losses_stew');
        $this->dropColumn('Item', 'losses_bake');
        $this->dropColumn('Item', 'weight');
    }
}