<?php

use yii\db\Migration;

class m160809_114305_Sliders extends Migration
{
    public function up()
    {
        $this->createTable('sliders', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'active' => $this->boolean()->defaultValue(true),
            'link' => $this->boolean()->defaultValue(false),
            'link_value' => $this->string(),
            'img' => $this->string(),
        ]);


        $this->batchInsert('sliders', ['id','label','active','link','link_value','img'], [

            [1, 'slide1',true ,'','','slider1.jpg'],
            [2, 'slide2',false,'','','slider2.jpg'],
            [3, 'slide3',false,'','','slider3.jpg'],

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
