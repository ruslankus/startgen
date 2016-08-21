<?php

use yii\db\Migration;

class m160818_210805_Orders extends Migration
{
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey('10'),
            'name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'visit_date' => $this->dateTime(),
            'car_id' => $this->integer()->unsigned()->notNull(),
            'problem_description' => $this->text(),
            'is_seen' => $this->boolean()->notNull()->defaultValue(false),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

    }

    public function down()
    {
        $this->dropTable('orders');
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
