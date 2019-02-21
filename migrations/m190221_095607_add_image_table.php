<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190221_095607_add_image_table
 */
class m190221_095607_add_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('image', [
            'id' => Schema::TYPE_PK,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_095607_add_image_table cannot be reverted.\n";

        return false;
    }
    */
}
