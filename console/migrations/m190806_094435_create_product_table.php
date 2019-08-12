<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190806_094435_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'main_photo' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->notNull(),
            'created_time' => $this->integer()->notNull(),
            'updated_time' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_product_id', '{{%product}}', 'id');

        $this->addColumn('{{%product}}', 'category_id', 'UUID NOT NULL');
        $this->addColumn('{{%product}}', 'brand_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_product_category', '{{%product}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_product_brand', '{{%product}}', 'brand_id', '{{%brand}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category', '{{%product}}');
        $this->dropForeignKey('fk_product_brand', '{{%product}}');
        $this->dropTable('{{%product}}');
    }
}
