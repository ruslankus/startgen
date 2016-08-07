<?php

use yii\db\Migration;

class m160806_193008_Languages extends Migration
{
    public function up()
    {

        $this->createTable('languages', [
            'id' => $this->primaryKey('10'),
            'prefix' => $this->string('2')->notNull(),
            'locale' => $this->string('6')->notNull(),
            'name' => $this->string('20')->notNull(),
            'active' => $this->boolean()->notNull()->defaultValue(true),
            'default' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);

        $this->batchInsert('languages', ['prefix', 'locale', 'name','active', 'default', 'created_at', 'updated_at'], [
            ['en', 'en-EN', 'English',true ,true , date("Y-m-d H:i:s"), date("Y-m-d H:i:s") ],
            ['ru', 'ru-RU', 'Русский',true ,false, date("Y-m-d H:i:s"), date("Y-m-d H:i:s") ],
            ['lt', 'lt-LT', 'Lietuvių',true ,false, date("Y-m-d H:i:s"), date("Y-m-d H:i:s") ],
        ]);

    }

    public function down()
    {
        $this->dropTable('languages');
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
