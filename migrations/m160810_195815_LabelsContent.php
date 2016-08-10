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
            [3,2,'Записатся на ремонт'],
            [3,3,'Remonto registravimas'],


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
