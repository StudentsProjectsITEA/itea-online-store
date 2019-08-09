<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_param}}`.
 */
class m190806_094556_create_category_param_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->createTable('{{%category_param}}', [
            'id' => $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid'),
        ]);

        $this->addPrimaryKey('pk_category_param_id', '{{%category_param}}', 'id');

        $this->addColumn('{{%category_param}}', 'category_id', 'UUID NOT NULL');
        $this->addColumn('{{%category_param}}', 'param_id', 'UUID NOT NULL');
        $this->addForeignKey('fk_category_param_category', '{{%category_param}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_category_param_param', '{{%category_param}}', 'param_id', '{{%param}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_param_category', '{{%category_param}}');
        $this->dropForeignKey('fk_category_param_param', '{{%category_param}}');
        $this->dropTable('{{%category_param}}');
    }
}
