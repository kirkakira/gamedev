<?php

use yii\db\Migration;

class m250627_155150_add_views_to_topic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%topic}}', 'views', $this->integer()->defaultValue(0));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%topic}}', 'views');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250627_155150_add_views_to_topic_table cannot be reverted.\n";

        return false;
    }
    */
}
