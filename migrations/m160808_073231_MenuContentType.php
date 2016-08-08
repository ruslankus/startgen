<?php

use yii\db\Migration;

class m160808_073231_MenuContentType extends Migration
{
    public function up()
    {
        $this->createTable('menu_content_type', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string()
        ]);


        $this->batchInsert('menu_content_type', ['id','label'], [
            [1,'page'],[2,'catalog'],[3,'link']
        ]);
    }

    public function down()
    {
        echo "m160808_073231_MenuContentType cannot be reverted.\n";

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
