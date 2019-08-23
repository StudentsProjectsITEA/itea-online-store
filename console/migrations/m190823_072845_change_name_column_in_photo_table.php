<?php

use yii\db\Migration;

/**
 * Class m190823_072844_change_user_id_column_in_order_table
 */
class m190823_072845_change_name_column_in_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE photo DROP CONSTRAINT photo_name_key;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('photo', 'name', $this->string()->notNull()->unique());
    }
}
