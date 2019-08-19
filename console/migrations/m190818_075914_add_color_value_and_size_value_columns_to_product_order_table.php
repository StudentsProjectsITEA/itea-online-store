<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_order}}`.
 */
class m190818_075914_add_color_value_and_size_value_columns_to_product_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_order', 'color_value', $this->string());
        $this->addColumn('product_order', 'size_value', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_order', 'size_value');
        $this->dropColumn('product_order', 'color_value');
    }
}
