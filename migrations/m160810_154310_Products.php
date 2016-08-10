<?php

use yii\db\Migration;

class m160810_154310_Products extends Migration
{
    public function up()
    {
        $file = Yii::getAlias('@app'). DIRECTORY_SEPARATOR .'products.sql';
        $sql = file_get_contents($file);

        $this->execute($sql);
    }

    public function down()
    {
       $this->dropTable('products');
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
