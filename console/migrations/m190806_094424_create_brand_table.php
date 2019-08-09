<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brand}}`.
 */
class m190806_094424_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%brand}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
        ]);

        $this->addPrimaryKey('pk_brand_id', '{{%brand}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brand}}');
    }
}
