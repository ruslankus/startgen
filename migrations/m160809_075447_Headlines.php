<?php

use yii\db\Migration;

class m160809_075447_Headlines extends Migration
{
    public function up()
    {
        $this->createTable('headlines', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'img' => $this->string(),
        ]);


        $this->batchInsert('headlines', ['id','label','img'], [

            [1, 'diagnostic','diag_icon.svg'],
            [2, 'repair','repair_icon.svg'],
            [3, 'sales','sales_icon.svg'],
            [4, 'consult','consult_icon.svg']

        ]);
    }

    public function down()
    {
       $this->dropTable('headlines');
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
