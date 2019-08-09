<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photo}}`.
 */
class m190806_095320_create_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%photo}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'name' => $this->string()->notNull()->unique(),
            'is_main' => $this->boolean()->notNull(),
            'created_time' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_photo_id', '{{%photo}}', 'id');

        $this->addColumn('{{%photo}}', 'product_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_photo_product', '{{%photo}}', 'product_id', '{{%product}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_photo_product', '{{%photo}}');
        $this->dropTable('{{%photo}}');
    }
}
