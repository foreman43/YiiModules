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
                'password' => Yii::$app->security->generatePasswordHash('admin'),
                'auth_key' => Yii::$app->security->generateRandomString(),
                'access_token' => Yii::$app->security->generateRandomString()
            ]
        );

        $this->insert(
            'user',
            [
                'first_name' => 'demo',
                'last_name' => 'demo',
                'email' => 'demo@gmail.com',
                'phone' => '81112223344',
                'password' => Yii::$app->security->generatePasswordHash('demo'),
                'auth_key' => Yii::$app->security->generateRandomString(),
                'access_token' => Yii::$app->security->generateRandomString()
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
