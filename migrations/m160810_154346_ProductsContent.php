<?php

use yii\db\Migration;

class m160810_154346_ProductsContent extends Migration
{
    public function up()
    {
        $this->createTable('product_content', [
            'id' => $this->primaryKey('10'),
            'product_id' => $this->integer()->unsigned()->notNull(),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'product_title' => $this->string(),
            'product_description' => $this->text(),
            'product_text' => $this->text()

        ]);

        $this->addForeignKey(
            'fk-product_id_product_id',
            'product_content',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('product_content');
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
