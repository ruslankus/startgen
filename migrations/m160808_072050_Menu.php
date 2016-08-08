<?php

use yii\db\Migration;

class m160808_072050_Menu extends Migration
{
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'content_type' => $this->integer(10)->unsigned()->notNull(),
            'content_id' => $this->integer(10)->unsigned(),
            'content_value' => $this->string(),
            'order' => $this->smallInteger(),
        ]);


        $this->batchInsert('menu', ['label', 'content_type','content_id', 'content_value', 'order'], [

            ['main',1, '','',''],
            ['about',1, 2,'',''],
            ['catalog',2, '','',''],
            ['contacts', 1, 3,'','']
        ]);

    }

    public function down()
    {
        $this->dropTable('menu');
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
