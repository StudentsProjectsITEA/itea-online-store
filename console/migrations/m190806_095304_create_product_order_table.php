<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_order}}`.
 */
class m190806_095304_create_product_order_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%product_order}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'quantity' => $this->integer()->notNull(),
            'discount' => $this->integer(),
        ]);

        $this->addPrimaryKey('pk_product_order_id', '{{%product_order}}', 'id');

        $this->addColumn('{{%product_order}}', 'product_id', 'UUID NOT NULL');
        $this->addColumn('{{%product_order}}', 'order_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_product_order_product', '{{%product_order}}', 'product_id', '{{%product}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_product_order_order', '{{%product_order}}', 'order_id', '{{%order}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_order_product', '{{%product_order}}');
        $this->dropForeignKey('fk_product_order_order', '{{%product_order}}');
        $this->dropTable('{{%product_order}}');
    }
}
