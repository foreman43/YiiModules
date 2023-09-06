<?php

use yii\db\Migration;

/**
 * Class m230906_094806_create_table_user
 */
class m230906_094806_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'user',
            [
                'id' => $this->primaryKey(),
                'first_name' => $this->string(25)->notNull(),
                'last_name' => $this->string(25)->notNull(),
                'patronymic' => $this->string(25)->notNull()->defaultValue(''),
                'email' => $this->string(30)->notNull(),
                'phone' => $this->string(15)->notNull(),
                'date_create' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'password' => $this->string(255)
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
