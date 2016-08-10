<?php

use yii\db\Migration;

class m160809_114305_Sliders extends Migration
{
    public function up()
    {
        $this->createTable('sliders', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'link' => $this->boolean()->defaultValue(false),
            'link_value' => $this->string(),
            'img' => $this->string(),
        ]);


        $this->batchInsert('sliders', ['id','label','link','link_value','img'], [

            [1, 'slide1','','','slider1.jpg'],
            [2, 'slide2','','','slider2.jpg'],
            [3, 'slide3','','','slider3.jpg'],

        ]);
    }

    public function down()
    {
        $this->dropTable('sliders');
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
