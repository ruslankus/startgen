<?php

use yii\db\Migration;

class m160821_125133_MessagesContent extends Migration
{
    public function up()
    {
        $this->createTable('messages_content', [

            'id' => $this->primaryKey('10'),
            'message_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'content' => $this->text()
        ]);

        $this->batchInsert('messages_content', ['message_id','lang_id', 'content'], [

            [1,1,'make appointent'],
            [1,2,'Вы можете заренее зарезервировать ремонт вашего автомобиля. Заполните все поля формы и коротко опишите проблему.'],
            [1,3,'lietuvuskas tekstas'],

            [2,1,'lietuvuskas tekstas'],
            [2,2,'Ваша заявка получена, ближйщее время мы вам перезвоним для уточнение более точного вркмени визита '],
            [2,3,'lietuvuskas tekstas'],

        ]);
    }


    public function down()
    {
        $this->dropTable('messages_content');
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
