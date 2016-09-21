<?php

use yii\db\Migration;

class m160809_133159_settings extends Migration
{
    public function up()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'value' => $this->string()

        ]);


        $this->batchInsert('settings', ['label','value'], [
            ['city', "Vilnius m."],
            ['street', 'P.Lukšio g'],
            ['house', '16'],
            ['flat', ''],
            ['phone', '852793989'],
            ['mob_phone', '+37063889128'],
            ['email', "email.mobilestarter@gmail.com"],
            ['order_email', 'ruslan@inlu.net'],
            ['post_code', "LT 02166"]


        ]);
    }

    public function down()
    {
        $this->dropTable('settings');
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
