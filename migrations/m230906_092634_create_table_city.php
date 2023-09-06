<?php

use yii\db\Migration;

/**
 * Class m230906_092634_create_table_city
 */
class m230906_092634_create_table_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'city',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(50)->notNull(),
                'date_create' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');
    }
}
