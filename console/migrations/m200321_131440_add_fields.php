<?php

use yii\db\Migration;

/**
 * Class m200321_131440_add_fields
 */
class m200321_131440_add_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%room}}', 'share_bathroom', $this->integer()->defaultValue(0));
        $this->addColumn('{{%room}}', 'imagen_url', $this->text());

        $this->addColumn('{{%client}}', 'address', $this->string());
        $this->addColumn('{{%client}}', 'phone', $this->string()->notNull());
        $this->addColumn('{{%client}}', 'foreign', $this->integer());

        $this->addColumn('{{%reservation}}', 'cod_register', $this->string()->unique());
        $this->addColumn('{{%room_type}}', 'description', $this->string());

        // $this->addColumn('{{%room_type}}', 'people_capacity', $this->string()->unique());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200321_131440_add_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200321_131440_add_fields cannot be reverted.\n";

        return false;
    }
    */
}
