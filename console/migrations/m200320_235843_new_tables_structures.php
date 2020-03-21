<?php

use yii\db\Migration;

/**
 * Class m200320_235843_new_tables_structures
 */
class m200320_235843_new_tables_structures extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reservation}}', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'pleople_count' => $this->integer()->notNull(),
            'invoice_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'starting_date' => $this->date()->notNull(),
            'ending_date' => $this->date()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'identity' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('{{%room}}', [
            'id' => $this->primaryKey(),
            'people_capacity' => $this->integer()->notNull(),
            'bed' => $this->integer()->notNull(),
            'bed_description' => $this->string(),
            'bathroom' => $this->integer()->notNull(),
            'description' => $this->string(),
            'status_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->createTable('{{%room_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%invoice}}', [
            'id' => $this->primaryKey(),
            'subtotal' => $this->integer()->notNull(),
            'total' => $this->integer()->notNull(),
            'payment_type' => $this->integer()->notNull(),
            'paid' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('{{%room_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%room_log}}', [
            'id' => $this->primaryKey(),
            'checkin' => $this->dateTime()->notNull(),
            'checkout' => $this->dateTime()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'room_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);





        $this->addForeignKey('room', '{{%reservation}}', 'room_id', '{{%room}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('client', '{{%reservation}}', 'client_id', '{{%client}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('invoice', '{{%reservation}}', 'invoice_id', '{{%invoice}}', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('type', '{{%room}}', 'type_id', '{{%invoice}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('status', '{{%room}}', 'status_id', '{{%room_status}}', 'id', 'CASCADE', 'CASCADE');


        $this->addForeignKey('userc', '{{%client}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('useri', '{{%invoice}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('userr', '{{%reservation}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('userlog', '{{%room_log}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200320_235843_new_tables_structures cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200320_235843_new_tables_structures cannot be reverted.\n";

        return false;
    }
    */
}
