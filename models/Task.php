<?php

namespace zabachok\vega\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use zabachok\vega\models\TaskLog;

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

    public static $statuses = [
        0 => 'Новая',
        1 => 'В работе',
        2 => 'На паузе',
        3 => 'Завершена',
        4 => 'Отменена',
    ];
    public static $priorities = [
        0 => 'Низкий',
        1 => 'Нормальный',
        2 => 'Высокий',
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
            [['project_id', 'title',], 'required'],
            [['project_id', 'created_at', 'updated_at', 'closed_at', 'status', 'priority'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['project_id', 'status', 'priority'], 'filter', 'filter' => 'intval']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Номер',
            'project_id' => 'Проект',
            'created_at' => 'Создана',
            'updated_at' => 'Изменена',
            'closed_at' => 'Закрыта',
            'status' => 'Статус',
            'priority' => 'Приоритет',
            'title' => 'Заголовок',
            'description' => 'Description',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('UNIX_TIMESTAMP()'),
            ],
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        TaskLog::touch($this, $changedAttributes);
    }

    public function getLog()
    {
        return $this->hasMany(TaskLog::className(), ['task_id' => 'task_id'])->orderBy(['created_at' => SORT_DESC]);
    }

    public function getPlayPeriod()
    {
        return $this->hasOne(Period::className(), ['task_id' => 'task_id'])
            ->where(['end' => null]);
    }

    public function getPeriods()
    {
        return $this->hasMany(Period::className(), ['task_id' => 'task_id'])->orderBy(['start' => SORT_DESC]);
    }

    public function getPeriodsLength()
    {
        return $this->getPeriods()
            ->select(new Expression('SUM(`length`)'))->scalar();
    }
}
