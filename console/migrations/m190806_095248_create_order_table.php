<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m190806_095248_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'status_id' => $this->smallInteger()->notNull(),
            'payment_id' => $this->integer()->notNull(),
            'shipping_id' => $this->integer()->notNull(),
            'shipping_address' => $this->string()->notNull(),
            'created_time' => $this->integer()->notNull(),
            'updated_time' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_order_id', '{{%order}}', 'id');

        $this->addColumn('{{%order}}', 'user_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_order_user', '{{%order}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_user', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
