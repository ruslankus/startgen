<?php

use yii\db\Migration;

class m160808_110255_PagesBlocksType extends Migration
{
    public function up()
    {

        $this->createTable('pages_blocks_types', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'name' => $this->string(),
        ]);

        $this->batchInsert('pages_blocks_types' , ['label', 'name'], [

            ['html', "HTML Block"],
            ['form', "Block with Form"],
            ['headline', " Headlines Block"],
            ['widget', "Block with widget"],
            ['image', "Block with image"],
            ['category', "Block with categories"]
        ]);
    }



    public function down()
    {
        $this->dropTable('blocks_types');
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
