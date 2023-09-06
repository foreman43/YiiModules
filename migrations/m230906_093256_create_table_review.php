<?php

use yii\db\Migration;

/**
 * Class m230906_093256_create_table_review
 */
class m230906_093256_create_table_review extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'review',
            [
                'id' => $this->primaryKey(),
                'id_city' => $this->tinyInteger()->notNull()->defaultValue(0),
                'title' => $this->string(100)->notNull(),
                'text' => $this->string(255)->notNull(),
                'rating' => $this->tinyInteger()->notNull()->defaultValue(0),
                'img' => $this->binary(65535),
                'id_author' => $this->tinyInteger()->notNull(),
                'date_create' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('review');
    }
}
