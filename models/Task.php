<?php

namespace zabachok\vega\models;

use Yii;

/**
 * This is the model class for table "vega_task".
 *
 * @property integer $task_id
 * @property integer $project_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $closed_at
 * @property integer $status
 * @property integer $priority
 * @property string $title
 * @property string $description
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vega_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'created_at', 'status', 'priority'], 'required'],
            [['project_id', 'created_at', 'updated_at', 'closed_at', 'status', 'priority'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'project_id' => 'Project ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'closed_at' => 'Closed At',
            'status' => 'Status',
            'priority' => 'Priority',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
