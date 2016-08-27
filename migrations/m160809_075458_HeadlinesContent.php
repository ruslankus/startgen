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

            [1,2, 'Диагностика', 'Наш автосервис,производит полную проверку стартеров,генераторов и диагностику электрооборудования.
            Агрегаты проходят полную разборку и проверку отдельно каждого узла,с последующей диагностикой на специальном оборудовании,
            имитирующим работу автомобиля'],


            [1,3, 'Diagnostika', 'Mūsų autoservisas teikia starterių ir generatorių patikros diagnostika. Bėndras 
            irenginio darbingumas nustatomas starterių ir generatorių tikrinimo stendo pagalba, kuria lydi pilnas 
            irenginio išardymas ir kiekvieno mazgo atskirai patikrinimas.'],

            [2,1, 'Repair', 'English text'],

            [2,2, 'Ремонт', ' Ремонтируем все виды Стартеров,Генераторов,для всех видов легкового и грузового транспорта. Специального,
             сельхозназначения, морского, подьёмного и т.д.'],

            [2,3, 'Rėmontas', 'Remontuojame STARTERIUS, GENERATORIUS lengviesiems automobiliams, vilkikams, 
            autobusams, žemės ūkio, jūrinės paskirties, sunkiąjai technikai, krautuvams, keltuvams, kranams, įvairiai 
            spec. technikai.'],

            [3,1, 'Sales', 'English text'],
            [3,2, 'Продажа', 'Продаём только качественные агрегаты,и запчасти для Стартеров и Генераторов,известных 
            мировых производителей : ( Bosch, Valeo, Prestolite, Magneti Marelli, Iskra, Delco Remy, Visteon, Cargo, 
            Transpo, Mobiletron, Mitsubishi, Hitachi и др.)'],

            [3,3, 'Pardavimas', 'Kokybiškos pasaulinių gamintojų STARTERIŲ, GENERATORIŲ dalys (Bosch, Valeo, Prestolite,
             Magneti Marelli, Iskra, Delco Remy, Visteon, Cargo, Transpo, Mobiletron, Mitsubishi, Hitachi ir kt.'],


            [4,1, 'Consulting', 'English text'],

            [4,2, 'Консультация ', 'Нащи специалисты помогут вам, найти необходимую запчасть,используя данные вашего
             автомобиля или по оригинальному номеру Стартера,Генератора.'],

            [4,3, 'Konsūltavimas', 'Mūsų patyrę darbuotojai padės parinkti tinkančias dalis pagal starterio,generatoriaus arba
             automobilio duomenis.'],

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
