<?php

use yii\db\Migration;

class m160811_122408_Users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey('10'),
            'root' => $this->boolean()->defaultValue(false),
            'username' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)


        ]);

        $this->batchInsert('users',
            ['root','username','password','auth_key'],
            [
                [ false, 'admin', '$2y$13$aEn58tAKyUcsvgyjm5CtDeOkSXu.XcKqLQ.4ZylWk3.nsGQ1uL5km', null ]
            ]
        );
    }

    public function down()
    {
        $this->dropTable('users');
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
