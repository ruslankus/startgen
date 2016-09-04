<?php

use yii\db\Migration;

class m160821_125122_Messages extends Migration
{
    public function up()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string()
        ]);


        $this->batchInsert('messages', ['id','label'], [
            [1, 'make appointent'],
            [2, 'bookikng sussess'],
            [3, 'book repair'],

        ]);
    }

    public function down()
    {
        $this->dropTable('messages');
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
