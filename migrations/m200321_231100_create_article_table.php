<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m200321_231100_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
		    'user_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull(),
            'body' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime(),
		    'update_at' => $this->dateTime(),
		    'created_by' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-article-user_id',
            'article',
            'user_id'
        );
		
		
		   $this->addForeignKey(
            'fk-article-user-created-by_id',
            'article',
            'user_id',
            'user',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-article-user-created-by_id', 'article');

        $this->dropIndex('idx-article-user_id', 'article');

        $this->dropTable('{{%article}}');
    }
}
