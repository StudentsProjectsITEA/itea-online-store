<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190806_094413_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'name' => $this->string()->notNull()->unique(),
            'parent_id' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_category_id', '{{%category}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
