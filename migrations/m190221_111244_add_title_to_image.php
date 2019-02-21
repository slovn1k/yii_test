<?php

use yii\db\Migration;

/**
 * Class m190221_111244_add_title_to_image
 */
class m190221_111244_add_title_to_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('image', 'title', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('image', 'image_path');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_111244_add_title_to_image cannot be reverted.\n";

        return false;
    }
    */
}
