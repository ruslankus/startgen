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
            [3, 'make appointent'],
            [4, 'what_we_do'],
            [5, 'our_product'],
            [6, 'read_more'],
            [7, 'find'],
            [8, 'info'],
            [9, 'contact_us'],
            [10, 'name'],
            [11, 'visit_date'],
            [12, 'car_type'],
            [13, 'problem_description']
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
