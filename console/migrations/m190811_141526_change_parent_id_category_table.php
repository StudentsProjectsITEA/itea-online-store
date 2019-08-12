<?php

use yii\db\Migration;

/**
 * Class m190811_141526_change_parent_id_category_table
 */
class m190811_141526_change_parent_id_category_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\NotSupportedException
     */
    public function safeUp()
    {
        $this->dropColumn('{{%category}}', 'parent_id');
        $this->addColumn('{{%category}}', 'parent_id',
            $this->getDb()->getSchema()->createColumnSchemaBuilder('uuid')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'parent_id');
        $this->addColumn('{{%category}}', 'parent_id', $this->integer()->notNull());
    }
}
