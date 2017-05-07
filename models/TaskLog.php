<?php

namespace zabachok\vega\models;

use Yii;

/**
 * This is the model class for table "vega_task_log".
 *
 * @property integer $task_log_id
 * @property integer $task_id
 * @property integer $created_at
 * @property string $param
 * @property integer $from
 * @property integer $to
 */
class TaskLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vega_task_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'created_at', 'from', 'to'], 'integer'],
            [['param'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_log_id' => 'Task Log ID',
            'task_id' => 'Task ID',
            'created_at' => 'Created At',
            'param' => 'Param',
            'from' => 'From',
            'to' => 'To',
        ];
    }
}
