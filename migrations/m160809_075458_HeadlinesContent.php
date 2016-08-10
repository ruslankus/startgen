<?php

use yii\db\Migration;

class m160809_075458_HeadlinesContent extends Migration
{
    public function up()
    {
        $this->createTable('headlines_content', [

            'id' => $this->primaryKey('10'),
            'headline_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'title' => $this->string(),
            'text' => $this->text()
        ]);


        $this->batchInsert('headlines_content', ['headline_id','lang_id', 'title', 'text'], [

            [1,1, 'Diagnostic', 'English text'],
            [1,2, 'Диагностика', 'Русский текст'],
            [1,3, 'Diagnostika', 'Mūsų autoservisas teikia starterių ir generatorių patikros diagnostika. Bėndras 
            irenginio darbingumas nustatomas starterių ir generatorių tikrinimo stendo pagalba, kuria lydi pilnas 
            irenginio išardymas ir kiekvieno mazgo atskirai patikrinimas.'],

            [2,1, 'Repair', 'English text'],
            [2,2, 'Ремонт', 'Русский текст'],
            [2,3, 'Rėmontas', 'Remontuojame STARTERIUS, GENERATORIUS lengviesiems automobiliams, vilkikams, 
            autobusams, žemės ūkio, jūrinės paskirties, sunkiąjai technikai, krautuvams, keltuvams, kranams, įvairiai 
            spec. technikai.'],

            [3,1, 'Sales', 'English text'],
            [3,2, 'Продажа', 'Русский текст'],
            [3,3, 'Pardavimas', 'Kokybiškos pasaulinių gamintojų STARTERIŲ, GENERATORIŲ dalys (Bosch, Valeo, Prestolite,
             Magneti Marelli, Iskra, Delco Remy, Visteon, Cargo, Transpo, Mobiletron, Mitsubishi, Hitachi ir kt.'],

            [4,1, 'Consulting', 'English text'],
            [4,2, 'Консультация ', 'Русский текст'],
            [4,3, 'Konsūltavimas', 'Mūsų specialistai,padęs jums surastį tinkantį dėtale, pagal starterio, generatoriaus
             numerį, arba pagal automobilio duomenis.'],

         ]);
    }

    public function down()
    {
       $this->dropTable('healines_content');
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
