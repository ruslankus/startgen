<?php

use yii\db\Migration;

class m160808_110234_PagesBlocks extends Migration
{
    public function up()
    {
        $this->createTable('pages_blocks', [
            'id' => $this->primaryKey('10'),
            'page_id' => $this->integer(10)->unsigned()->notNull(),
            'type' => $this->integer()->unsigned()->notNull(),
            'block_value' => $this->string(),
            'block_template' => $this->string(),
            'label' => $this->string(),
            'order' => $this->smallInteger()
        ]);

        $this->batchInsert('pages_blocks', ['page_id', 'type', 'block_value' ,'block_template' ,'label', 'order'], [

            [1, 3,'1,2,3,4','','headline',''],
            [1, 1,'','','content', ''],
            [1, 6,'1,2,3,4','', 'category', ''],
            [2, 1,'','' , 'content', ''],
            [3, 2,'','' ,'content', ''],
        ]);

    }

    public function down()
    {
        echo "m160808_110234_PagesBlocks cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
