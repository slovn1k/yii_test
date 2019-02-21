<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190221_091004_add_images_table
 */
class m190221_091004_add_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('images', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_091004_add_images_table cannot be reverted.\n";

        return false;
    }
    */
}
