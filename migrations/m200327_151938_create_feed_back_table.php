<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feed_back}}`.
 */
class m200327_151938_create_feed_back_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feed_back}}', [
            'id' => $this->primaryKey(),
            'purpose_id' => $this->smallInteger()->notNull(),
            'name' => $this->string(),
            'email' => $this->string(),
            'subject' => $this->string(),
            'content' => $this->text(),
            'answer' => $this->text(),
            'created_at' => $this->integer(),
            'user_update' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk_user_feed_back', 'feed_back', 'user_update', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_feed_back', 'feed_back');

        $this->dropTable('{{%feed_back}}');
    }
}
