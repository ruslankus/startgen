<?php

use yii\db\Migration;

class m160808_072058_MenuTrl extends Migration
{
    public function up()
    {
        $this->createTable('menu_trl', [
            'id' => $this->primaryKey('10'),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'menu_id' => $this->integer()->unsigned()->notNull(),
            'menu_text' => $this->string(),
        ]);



        $this->batchInsert('menu_trl', ['lang_id', 'menu_id' , 'menu_text'], [
            [1, 1, 'Main'],
            [2, 1, 'Главная'],
            [3, 1, 'Pagrindine'],
            [1, 2, 'About'],
            [2, 2, 'О нас'],
            [3, 2, 'Apie mus'],
            [1, 3, 'Catalog'],
            [2, 3, 'Каталог'],
            [3, 3, 'Katalogas'],
            [1, 4, 'Contacts'],
            [2, 4, 'Контакты'],
            [3, 4, 'Kontaktai']
        ]);
    }

    public function down()
    {
        echo "m160808_072058_MenuTrl cannot be reverted.\n";

        return false;
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
