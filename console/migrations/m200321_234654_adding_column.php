<?php

use yii\db\Migration;

/**
 * Class m200321_234654_adding_column
 */
class m200321_234654_adding_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%room}}', 'ocean_view', $this->integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200321_234654_adding_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200321_234654_adding_column cannot be reverted.\n";

        return false;
    }
    */
}
