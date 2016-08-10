<?php

use yii\db\Migration;

class m160809_114312_SlidersContent extends Migration
{
    public function up()
    {
        $this->createTable('sliders_content', [

            'id' => $this->primaryKey('10'),
            'slide_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'title' => $this->string(),
            'text' => $this->text()
        ]);

        $this->batchInsert('sliders_content', ['slide_id','lang_id', 'title', 'text'], [

            [1,1, 'English title', "English text text text"],
            [1,2, 'Русский заголовок', "Русский текст текст текст текст текст"],
            [1,3, 'Lietuviskas pavadinimas', "Lietuviskas tekstas tekstas tekstas tekstas"],

            [2,1, 'English title', "English text text text"],
            [2,2, 'Русский заголовок', "Русский текст текст текст текст текст"],
            [2,3, 'Lietuviskas pavadinimas', "Lietuviskas tekstas tekstas tekstas tekstas"],

            [3,1, 'English title', "English text text text"],
            [3,2, 'Русский заголовок', "Русский текст текст текст текст текст"],
            [3,3, 'Lietuviskas pavadinimas', "Lietuviskas tekstas tekstas tekstas tekstas"],

        ]);
    }

    public function down()
    {
        $this->dropTable('sliders_content');
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
