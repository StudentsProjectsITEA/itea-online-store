<?php

use yii\db\Migration;

/**
 * Class m190823_072844_change_user_id_column_in_order_table
 */
class m190823_072844_change_user_id_column_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('order', 'user_id', 'UUID');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('order', 'user_id', 'UUID NOT NULL');
    }
}
