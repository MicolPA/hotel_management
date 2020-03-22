<?php

use yii\db\Migration;

/**
 * Class m200322_195723_add_field_room
 */
class m200322_195723_add_field_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // $this->addColumn('{{%room}}', 'room_number', $this->integer()->notNull());
        $this->addColumn('{{%room_type}}', 'description', $this->text()->notNull());
        $this->addColumn('{{%room}}', 'pool_view', $this->integer()->defaultValue(0));
        $this->addColumn('{{%room}}', 'street_view', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200322_195723_add_field_room cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200322_195723_add_field_room cannot be reverted.\n";

        return false;
    }
    */
}
