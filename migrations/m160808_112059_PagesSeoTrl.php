<?php

use yii\db\Migration;

class m160808_112059_PagesSeoTrl extends Migration
{
    public function up()
    {
        $this->createTable('pages_seo_trl', [
            'id' => $this->primaryKey('10'),
            'page_id' => $this->integer(10)->unsigned()->notNull(),
            'lang_id' => $this->integer(10)->unsigned()->notNull(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'title' => $this->string()
        ]);


        $this->batchInsert('pages_seo_trl' , ['page_id', 'lang_id', 'description', 'keywords', 'title'], [
            [1,1,
                "Starterių,Generatorių detalių pardavimas.Starteriai,Generatoriai,Bosch, Valeo Mitsubishi,Motokraft,Denso,Marelli,Mitsuba.",
                'meta keywords',
                'Starterių Generatorių remontas ir pardavimas,Starterių,Generatorių restauracija.'],


            [1,2,"Starterių,Generatorių detalių pardavimas.Starteriai,Generatoriai,Bosch, Valeo Mitsubishi,Motokraft,Denso,Marelli,Mitsuba.",
                'meta russian keywords',
                'Starterių Generatorių remontas ir pardavimas,Starterių,Generatorių restauracija.'],

            [1,3,"Starterių,Generatorių detalių pardavimas.Starteriai,Generatoriai,Bosch, Valeo Mitsubishi,Motokraft,Denso,Marelli,Mitsuba.",

                'meta lithuanian keywords',

                'Starterių Generatorių remontas ir pardavimas,Starterių,Generatorių restauracija.'],

            [2,1,"meta description", 'meta keywords',  ' main page title'],
            [2,2,"meta russian description", 'meta russian keywords',  ' main russian page title'],
            [2,3,
                " Starterių,Generatorių detalių pardavimas.Starteriai,Generatoriai,Bosch, Valeo Mitsubishi,Motokraft,Denso,Marelli,Mitsuba.",

                'meta lithuanian keywords',

                'Starterių Generatorių remontas ir pardavimas,Starterių,Generatorių restauracija.'],

            [3,1,"meta description", 'meta keywords',  ' main page title'],
            [3,2,"meta russian description",

                'meta russian keywords',

                ' main russian page title'],

            [3,3," Starterių,Generatorių detalių pardavimas.Starteriai,Generatoriai,Bosch, Valeo Mitsubishi,Motokraft,Denso,Marelli,Mitsuba.",
                'meta lithuanian keywords',
                'Starterių Generatorių remontas ir pardavimas,Starterių,Generatorių restauracija.'],

        ]);
    }

    public function down()
    {
        $this->dropTable('pages_seo_trl');
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
