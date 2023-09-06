<?php

use yii\db\Migration;

/**
 * Class m230906_100057_add_test_users_in_user_table
 */
class m230906_100057_add_test_users_in_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(
            'user',
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '89991112233',
                'password' => Yii::$app->security->generatePasswordHash('admin')
            ]
        );

        $this->insert(
            'user',
            [
                'first_name' => 'demo',
                'last_name' => 'demo',
                'email' => 'demo@gmail.com',
                'phone' => '81112223344',
                'password' => Yii::$app->security->generatePasswordHash('demo')
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user',
            [
            'email' => 'admin@gmail.com'
            ]
        );

        $this->delete('user',
            [
                'email' => 'demo@gmail.com'
            ]
        );
    }
}
