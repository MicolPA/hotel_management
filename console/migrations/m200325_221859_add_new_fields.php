<?php

use yii\db\Migration;

/**
 * Class m200325_221859_add_new_fields
 */
class m200325_221859_add_new_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%user}}', 'photo_url', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'name', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'last_name', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'identity', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'phone', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'address', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200325_221859_add_new_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_221859_add_new_fields cannot be reverted.\n";

        return false;
    }
    */
}
