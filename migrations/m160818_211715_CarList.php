<?php

use yii\db\Migration;

class m160818_211715_CarList extends Migration
{
    public function up()
    {
        $this->createTable('car_list', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string()->notNull(),
            'name' => $this->string()->notNull()
        ]);

        $this->batchInsert('car_list', ['label', 'name'], [
            ['honda', 'Honda'],
            ['audi', 'Audi'],
            ['volvo', 'Volvo']
        ]);
    }

    public function down()
    {
        $this->dropTable('car_list');
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
