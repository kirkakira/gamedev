<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forum}}`.
 */
class m250627_152750_create_forum_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%forum}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // Добавляем forum_id в категории
        $this->addColumn('{{%category}}', 'forum_id', $this->integer());
        $this->addForeignKey(
            'fk-category-forum_id',
            '{{%category}}',
            'forum_id',
            '{{%forum}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-category-forum_id', '{{%category}}');
        $this->dropColumn('{{%category}}', 'forum_id');
        $this->dropTable('{{%forum}}');
    }
}
