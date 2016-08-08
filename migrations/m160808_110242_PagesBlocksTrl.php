<?php

use yii\db\Migration;

class m160808_110242_PagesBlocksTrl extends Migration
{
    public function up()
    {
        $this->createTable('pages_blocks_trl', [
            'id' => $this->primaryKey('10'),
            'block_id' => $this->integer(10)->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'content' => $this->text(),
            'order' => $this->smallInteger()
        ]);

        $this->batchInsert('pages_blocks_trl', ['block_id', 'lang_id', 'content', 'order'], [

            [2, 1, 'Content',''],
            [2, 2, 'Контент', ''],
            [2, 3, 'Kontentas', ''],
            [4, 1, 'Content',''],
            [4, 2, 'Контент', ''],
            [4, 3, 'Kontentas', ''],
            [5, 1, 'Content',''],
            [5, 2, 'Контент', ''],
            [5, 3, 'Kontentas', ''],


        ]);

    }

    public function down()
    {

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
