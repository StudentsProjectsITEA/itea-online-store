<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_param_value}}`.
 */
class m190806_094534_create_product_param_value_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%product_param_value}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'value' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('pk_product_param_value_id', '{{%product_param_value}}', 'id');

        $this->addColumn('{{%product_param_value}}', 'product_id', 'UUID NOT NULL');
        $this->addColumn('{{%product_param_value}}', 'param_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_product_param_value_product', '{{%product_param_value}}', 'product_id', '{{%product}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_product_param_value_param', '{{%product_param_value}}', 'param_id', '{{%param}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_param_value_product', '{{%product_param_value}}');
        $this->dropForeignKey('fk_product_param_value_param', '{{%product_param_value}}');
        $this->dropTable('{{%product_param_value}}');
    }
}
