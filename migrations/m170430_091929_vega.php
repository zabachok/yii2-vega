<?php

use yii\db\Migration;

class m170430_091929_vega extends Migration
{
    public function up()
    {
        $this->createTable('vega_project', [
            'project_id'=>$this->primaryKey(),
            'created_at'=>$this->integer(),
            'color'=>$this->string(6),
            'status'=>$this->integer(),
        ]);

        $this->createTable('vega_task', [
            'task_id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'closed_at' => $this->integer(),
            'status' => $this->integer()->notNull(),
            'priority' => $this->integer()->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
        ]);
        $this->createIndex('project', 'vega_task', [
            'project_id',
            'status',
            'updated_at',
        ]);

        $this->createTable('vega_task_log', [
            'task_log_id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'created_at' => $this->integer(),
            'param' => $this->string(15),
            'from' => $this->integer(),
            'to' => $this->integer(),
        ]);
        $this->createIndex('task', 'vega_task_log', [
            'task_id',
            'created_at',
        ]);

        $this->createTable('vega_period', [
            'period_id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'start' => $this->integer(),
            'end' => $this->integer(),
            'length' => $this->integer(),
        ]);
        $this->createIndex('task', 'vega_period', [
            'task_id',
            'start',
        ]);
    }

    public function down()
    {
        $this->dropTable('vega_project');
        $this->dropTable('vega_period');
        $this->dropTable('vega_task');
        $this->dropTable('vega_task_log');
    }
}
