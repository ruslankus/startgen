<?php

use yii\db\Migration;

class m160810_195815_LabelsContent extends Migration
{
    public function up()
    {
        $this->createTable('labels_content', [

            'id' => $this->primaryKey('10'),
            'label_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'content' => $this->string()
        ]);

        $this->batchInsert('labels_content', ['label_id','lang_id', 'content'], [

            [1,1,'Catalog'],
            [1,2,'Каталог'],
            [1,3,'Katalogas'],

            [2,1,'Phone'],
            [2,2,'Телефон'],
            [2,3,'Telefonas'],

            [3,1,'Book for repair'],
            [3,2,'Записаться на ремонт'],
            [3,3,'Remonto registravimas'],

            [4,1,'What we do'],
            [4,2,'Наши услуги'],
            [4,3,'Musu veikla'],

            [5,1,'Our Products'],
            [5,2,'Наши товары'],
            [5,3,'Musu produktai'],

            [6,1,'Read more'],
            [6,2,'Подробнее'],
            [6,3,'Тiksliau'],

            [7,1,'Find'],
            [7,2,'Как нас найти'],
            [7,3,'Kaip mus surast'],

            [8,1,'Info'],
            [8,2,'Информация'],
            [8,3,'Informacija'],

            [9,1,'Book repair'],
            [9,2,'Резервация ремонта'],
            [9,3,'Laiko rezervacija remontui'],

            [10,1,'Your name'],
            [10,2,'Ваше имя'],
            [10,3,'Jusu vardas '],

            [11,1,'Visit day'],
            [11,2,'День резервации'],
            [11,3,'Registracijos laikas remontui'],

            [12,1,'Car type'],
            [12,2,'Марка машины'],
            [12,3,'Automobilio markė.'],

            [13,1,'Problem description'],
            [13,2,'Описание проблемы'],
            [13,3,'Trumpas gedimo aprašymas.'],

            [14,1, 'Car year'],
            [14,2, 'Год производства'],
            [14,3, 'Pagaminimo metai.'],

            [15,1, 'Engine Power'],
            [15,2, 'Мощность двигателя'],
            [15,3, 'Variklio galia kw.'],

            [16,1, 'Engine Volume'],
            [16,2, 'Обьем двигателя см3'],
            [16,3, 'Variklio tūris cm3.'],

            [17,1, 'Select car'],
            [17,2, 'Выберите машину '],
            [17,3, 'Select car.'],

            [18,1, 'Close'],
            [18,2, 'Закрыть'],
            [18,3, 'Uždaryti'],

            [19,1, 'Send'],
            [19,2, 'Выслать'],
            [19,3, 'Siųsti'],

            [20,1, 'Submit'],
            [20,2, 'Отправить'],
            [20,3, 'Registruotis'],

            [21,1, 'Email'],
            [21,2, 'Email'],
            [21,3, 'Email'],

            [22,1, 'Mobile'],
            [22,2, 'Мобильный'],
            [22,3, 'Mobilus'],













        ]);
    }

    public function down()
    {
        $this->dropTable('labels_content');
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
