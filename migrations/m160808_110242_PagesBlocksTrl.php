<?php

use yii\db\Migration;

class m160808_110242_PagesBlocksTrl extends Migration
{
    public function up()
    {
        $this->createTable('pages_blocks_trl', [
            'id' => $this->primaryKey('10'),
            'block_id' => $this->integer(10)->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'content' => $this->text(),
            'order' => $this->smallInteger()
        ]);

        $this->batchInsert('pages_blocks_trl', ['block_id', 'lang_id', 'content', 'order'], [

            [2, 1, "<p>STARTER GENERATOR company was founded in Vilnius in 1997.Having started as a modest automotive 
parts store,the company has become one of the most successful automotive starter and alternator reconditioners 
in Lithuania.</p>
<p>We have been staffed with highly experienced personnel from the very beginning.Currently our company runs an 
automotive parts store,car service facility and a starter and alternator reconditioning facility.We are involved in a 
long and successful partnership with StartMobile enterprise of Europe.</p>
<p>Although our activities have been mainly concentrating on the local market,we hope that Lithuanian membership in 
the EU will open up new possibilities for successful partnerships and expansion of our acivities.</p>",''],


            [2, 2, "<p> Компания \"Стартер-Генератор\", начавшая свою деятельность в 1997 г. в г.Вильнюс, в настоящее 
время является одним из ведущих предприятий Литовской Республики, специализирующихся на продаже, ремонте и восстановлении 
стартеров и генераторов для всех видов автомобилей, включая грузовые автомобили, автобусы и спецтехнику. Мы предлагаем 
также широкий ассортимент комплектующих для ремонта стартеров и генераторов.Высококвалифицированный персонал проведет
 профессиональную диагностику и ремонт любой сложности в сжатые сроки. Для автосервисов и автотранспортных предприятий 
 предоставляются скидки и особые условия. Мы активно развиваемся, разрабатывая новые ассортиментные позиции и расширяя 
 рынок своей деятельности. Мы обеспечиваем максимальное наличие и предлагаем лучшее качество по лучшим ценам.С начала 
 2007года,наша компания представляет свою продукцию на российском рынке.</p>",


             ''],

            [2, 3, "<p>UAB STARTER GENERATOR įmonė,įkurta 1997 m. Vilniuje. Mūsų įmonė pradėjo savo veiklą, kaip 
 automobilių dalių parduotuvė. Vėliau tapome viena iš sėkmingiausią visos automobilių starterius ir generatorius 
 remontuojanti įmonė. Pas mus  dirba aukštos kvalifikacijos darbuotojai nuo įmonės įsikūrimo pradžios. Šiuo metu mųsū 
 kompanija vykdo ne tik automobilių dalių pardavimą, bet ir automobilių įrenginių,  starterių, generatorių remontą.</p>
 <p>Mūsų įmonė jau ilga laika sėkmingai bendradarbiauja su SGR company. Nors mūsų veikla buvo daugiausiai  orentuota į 
 vietini rinka, mes tikimės, kad Lietuvos narystė ES, atvers naujas galimybes sėkmingai partnerystei ir veiklos plėtrai
  ne tik ES šalyse, bet ir Rusijoje.</p>
  <p><strong>Nuo 2007 metų mes atstovaujame SGR žėnkla, Lietuvoje ir Baltijos šalyse.</strong></p>", ''],



            [4, 1, "<p>STARTER GENERATOR company was founded in Vilnius in 1997.Having started as a modest automotive 
parts store,the company has become one of the most successful automotive starter and alternator reconditioners 
in Lithuania.</p>
<p>We have been staffed with highly experienced personnel from the very beginning.Currently our company runs an 
automotive parts store,car service facility and a starter and alternator reconditioning facility.We are involved in a 
long and successful partnership with StartMobile enterprise of Europe.</p>
<p>Although our activities have been mainly concentrating on the local market,we hope that Lithuanian membership in 
the EU will open up new possibilities for successful partnerships and expansion of our acivities.</p> ",''],

            [4, 2, "<p> Компания \"Стартер-Генератор\", начавшая свою деятельность в 1997 г. в г.Вильнюс, в настоящее 
время является одним из ведущих предприятий Литовской Республики, специализирующихся на продаже, ремонте и восстановлении 
стартеров и генераторов для всех видов автомобилей, включая грузовые автомобили, автобусы и спецтехнику. Мы предлагаем 
также широкий ассортимент комплектующих для ремонта стартеров и генераторов.Высококвалифицированный персонал проведет
 профессиональную диагностику и ремонт любой сложности в сжатые сроки. Для автосервисов и автотранспортных предприятий 
 предоставляются скидки и особые условия. Мы активно развиваемся, разрабатывая новые ассортиментные позиции и расширяя 
 рынок своей деятельности. Мы обеспечиваем максимальное наличие и предлагаем лучшее качество по лучшим ценам.С начала 
 2007года,наша компания представляет свою продукцию на российском рынке.</p> ", ''],


            [4, 3,  "<p>UAB STARTER GENERATOR įmonė,įkurta 1997 m. Vilniuje. Mūsų įmonė pradėjo savo veiklą, kaip 
 automobilių dalių parduotuvė. Vėliau tapome viena iš sėkmingiausią visos automobilių starterius ir generatorius 
 remontuojanti įmonė. Pas mus  dirba aukštos kvalifikacijos darbuotojai nuo įmonės įsikūrimo pradžios. Šiuo metu mųsū 
 kompanija vykdo ne tik automobilių dalių pardavimą, bet ir automobilių įrenginių,  starterių, generatorių remontą.</p>
 <p>Mūsų įmonė jau ilga laika sėkmingai bendradarbiauja su SGR company. Nors mūsų veikla buvo daugiausiai  orentuota į 
 vietini rinka, mes tikimės, kad Lietuvos narystė ES, atvers naujas galimybes sėkmingai partnerystei ir veiklos plėtrai
  ne tik ES šalyse, bet ir Rusijoje.</p>
  <p><strong>Nuo 2007 metų mes atstovaujame SGR žėnkla, Lietuvoje ir Baltijos šalyse.</strong></p> ", ''],
            [5, 1, 'Content',''],
            [5, 2, 'Контент', ''],
            [5, 3, 'Kontentas', ''],


        ]);

    }

    public function down()
    {

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
