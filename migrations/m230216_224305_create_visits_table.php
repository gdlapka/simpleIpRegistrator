<?php

use yii\db\Migration;

class m230216_224305_create_visits_table extends Migration
{
    private string $tableName = 'visits';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'ip' => $this->string()->notNull(),
            'remote_ip' => $this->string()->null(),
            'host' => $this->string()->null(),
            'remote_host' => $this->string()->null(),
            'user_agent' => $this->string(512)->null(),
            'origin' => $this->string()->null(),
            'referrer' => $this->string()->null(),
            'time' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
