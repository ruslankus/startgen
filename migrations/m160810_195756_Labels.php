<?php

use yii\db\Migration;

class m160810_195756_Labels extends Migration
{
    public function up()
    {
        $this->createTable('labels', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string()
        ]);


        $this->batchInsert('labels', ['id','label'], [
            [1, 'catalog'],
            [2, 'phone'],
            [3, 'make appointent']
        ]);
    }

    public function down()
    {
       $this->dropTable('lable');
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
