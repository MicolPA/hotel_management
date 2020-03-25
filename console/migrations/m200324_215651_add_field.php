<?php

use yii\db\Migration;

/**
 * Class m200324_215651_add_field
 */
class m200324_215651_add_field extends Migration
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

        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'description' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addColumn('{{%room_type}}', 'initials', $this->string());
        $this->addColumn('{{%room_type}}', 'price_per_night', $this->integer());

        $this->addColumn('{{%reservation}}', 'comment', $this->text()->defaultValue(null));
        $this->addColumn('{{%reservation}}', 'nights', $this->integer()->defaultValue(null));
        $this->addColumn('{{%reservation}}', 'service_id', $this->integer()->defaultValue(null));
        $this->addColumn('{{%room_status}}', 'color', $this->string()->defaultValue(null));

        $this->addForeignKey('service', '{{%reservation}}', 'service_id', '{{%services}}', 'id', 'CASCADE', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200324_215651_add_field cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200324_215651_add_field cannot be reverted.\n";

        return false;
    }
    */
}
