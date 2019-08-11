<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%param}}`.
 */
class m190806_094522_create_param_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%param}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
            'name' => $this->string()->notNull()->unique(),
            'type_id' => $this->smallInteger()->notNull(),
            'is_required' => $this->boolean()->notNull(),
        ]);

        $this->addPrimaryKey('pk_param_id', '{{%param}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%param}}');
    }
}
