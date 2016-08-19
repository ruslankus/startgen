<?php

use yii\db\Migration;

class m160808_190048_Category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'parent_id' => $this->integer()->unsigned(),
            'img' => $this->string(),
        ]);

        $this->batchInsert('category', ['id','label', 'parent_id','img'], [

            [1, 'root','',''],
            [2, 'starters',1,'catalog1.jpg'],
            [3, 'starters_parts',1,'catalog2.jpg'],
            [4, 'alternators',1,'catalog3.jpg'],
            [5, 'alternators_parts', 1,'catalog4.jpg'],
            [6, 'other_parts',1,'catalog5.jpg'],


        ]);

    }

    public function down()
    {
        $this->dropTable('category');
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
