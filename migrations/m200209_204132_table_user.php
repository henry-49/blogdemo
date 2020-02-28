<?php

use yii\db\Migration;

/**
 * Class m200209_204132_table_user
 */
class m200209_204132_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('user', [
           'id' => $this->primaryKey(),
           'username' => $this->string(55)->notNull(),
           'password' => $this->string(255)->notNull(),
           'auth_key' => $this->string(255)->notNull(),
           'access_token' => $this->string(255)->notNull(),
       ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('user');
    }

}
