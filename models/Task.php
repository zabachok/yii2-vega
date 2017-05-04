<?php

namespace zabachok\vega\models;

use Yii;

/**
 * This is the model class for table "vega_task".
 *
 * @property integer $task_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $priority
 * @property integer $owner
 * @property integer $worker
 * @property integer $type
 * @property integer $time
 * @property string $title
 * @property string $description
 */
class Task extends \yii\db\ActiveRecord
{

//    public $status = 1;
//    public $priority = 2;
    public static $statuses = [
        1 => 'Новая',
        2 => 'W.I.P.',
        3 => 'Пауза',
        4 => 'Завершена',
        5 => 'Отменена',
    ];

    public static $priorities = [
        1 => 'Не важно',
        2 => 'Нормально',
        3 => 'Приоритетно',
        4 => 'Очень важно',
    ];


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
            [['created_at', 'updated_at', 'status', 'priority', 'owner', 'worker', 'type', 'time'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Статус',
            'priority' => 'Приоритет',
            'owner' => 'Owner',
            'worker' => 'Worker',
            'type' => 'Type',
            'time' => 'Time',
            'title' => 'Заголовок',
            'description' => 'Описание',
        ];
    }
}