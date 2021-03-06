<?php

use yii\db\Migration;

class m160808_190059_CategoryContent extends Migration
{
    public function up()
    {
        $this->createTable('category_content', [

            'id' => $this->primaryKey('10'),
            'category_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'title_seo' => $this->string(),
            'title' => $this->string(),
            'description_seo' => $this->string(),
            'keywords' => $this->string(),
            'snippet' => $this->text(),
            'text' => $this->text()
        ]);


         $this->batchInsert('category_content', ['category_id', 'lang_id','title_seo', 'title',
             'description_seo','keywords','snippet','text'], [

             [1,1,'Our catalog','Our catalog','root seo descr','root kewords', '', '' ],
             [1,2,'Наш каталог','Наш  каталог','root seo descr rus','root kewords rus', '', '' ],
             [1,3,'Mūsu katalogas','Mūsu katalogas','root seo descr lit','root kewords lit', '', '' ],

             [2,1,'starters','starters','starters seo descr','starters kewords', 'starters snippet', '' ],
             [2,2,'стартеры','стартеры', 'стартеры seo descr','стартеры kewords', 'стартеры snippet', '' ],
             [2,3,'starterai','starterai', 'starterai seo descr','starterai kewords', 'kokybiškos žymių gamintojų dalys', '' ],

             [3,1,'starters parts','starters parts', 'starters parts seo descr','starters parts kewords',
                 'starters parts snippet', '' ],

             [3,2,'Детали стартеров','Детали стартеров', 'стартеры детали seo descr','стартеры детали kewords',
                 'стартеры детали snippet', '' ],

             [3,3,'starterių dalys','starterių dalys', 'starterių dalys seo descr','
             starterių dalys kewords', 'kokybiškos žymių gamintojų dalys', '' ],

             [4,1,'alterantors','alterantors','alterantors seo descr','alterantors kewords', 'alterantors snippet', '' ],
             [4,2,'генераторы','генераторы', 'генераторы seo descr','альтернаторы kewords', 'альтернаторы snippet', '' ],
             [4,3,'generatoriai','generatoriai', 'generatoriai seo descr','generatoriai kewords',
                 'kokybiškos žymių gamintojų dalys', '' ],

             [5,1,'alterantors parts','alterantors parts','alterantors parts seo descr','alterantors parts kewords',
                 'alterantors parts snippet', '' ],

             [5,2,'Генератора детали','Генератора детали', 'Генератора детали seo descr',
                 'генераторы детали kewords', 'генераторы детали snippet', '' ],
             [5,3,'generatorių dalys','generatorių dalys', 'generatorių dalys seo descr',

                 'generatorių dalys kewords', 'kokybiškos žymių gamintojų dalys', '' ],

             [6,1,'others parts','others parts','others parts seo descr','others parts kewords',
                 'others parts snippet', '' ],

             [6,2,'Детали под заказ','Детали под заказ', 'другие детали seo descr',
                 'другие детали kewords', 'Оригинальные детали под заказ из Европы', '' ],
             [6,3,'Detalės pagal užsakima','Detalės pagal užsakima', 'kitos dėtalės seo descr',
                 'kitos dėtalės kewords', 'Originalus detalės,pagal užsakima iš Europos', '' ],


          ]);





    }

    public function down()
    {
       $this->dropTable("category_content");
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
