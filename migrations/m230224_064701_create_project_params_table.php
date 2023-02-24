<?php

use yii\db\Migration;
use app\models\logical\ProjectParams;

/**
 * project_params - вертикалка с параметрами проекта
 */
class m230224_064701_create_project_params_table extends Migration
{
    protected string $tableName = 'project_params';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'param_key' => $this->string()->notNull(),
            'param_value' => $this->string()->null(),
        ]);
        $this->insert($this->tableName, [
            'param_key' => ProjectParams::KEY_SHOW_USER_IP_NOTES,
            'param_value' => '0',
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
