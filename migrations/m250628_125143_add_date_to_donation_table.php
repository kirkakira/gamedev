<?php

use yii\db\Migration;

class m250628_125143_add_date_to_donation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    // Создайте новую миграцию командой: yii migrate/create add_timestamps_to_donation
    public function safeUp()
    {
        $this->addColumn('donation', 'created_at', $this->dateTime()->notNull());
        $this->addColumn('donation', 'updated_at', $this->dateTime()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('donation', 'created_at');
        $this->dropColumn('donation', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250628_125143_add_date_to_donation_table cannot be reverted.\n";

        return false;
    }
    */
}
