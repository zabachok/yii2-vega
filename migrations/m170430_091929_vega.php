<?php

use yii\db\Migration;

class m170430_091929_vega extends Migration
{
    public function up()
    {
        $this->createTable('vega_task', [
            'task_id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
            'priority' => $this->integer(),
            'owner' => $this->integer(),
            'worker' => $this->integer(),
            'type' => $this->integer(),
            'time' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
        ]);

        $this->createTable('vega_task_log', [
            'task_log_id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'created_at' => $this->integer(),
            'param' => $this->string(15),
            'from' => $this->integer(),
            'to' => $this->integer(),
        ]);

        $this->createTable('vega_period', [
            'period_id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'start' => $this->timestamp(),
            'end' => $this->timestamp()->null(),
            'length' => $this->integer(),
        ]);

        $this->createIndex('task', 'vega_task_log', [
            'task_id',
            'created_at',
        ]);

        $this->createIndex('task', 'vega_period', [
            'task_id',
            'start',
        ]);
    }

    public function down()
    {
        $this->dropTable('vega_task');
        $this->dropTable('vega_task_log');
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
