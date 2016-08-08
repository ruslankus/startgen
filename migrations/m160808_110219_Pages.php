<?php

use yii\db\Migration;

class m160808_110219_Pages extends Migration
{
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'main' => $this->boolean(),
            'order' => $this->smallInteger(),
        ]);

        $this->batchInsert('pages', ['label', 'main','order'], [

            ['main', true,'',],
            ['catalog', '', ''],
            ['contacts', '', '']
        ]);
    }

    public function down()
    {
        $this->dropTable('pages');
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
