<?php

namespace zabachok\vega\models;

use Yii;

/**
 * This is the model class for table "vega_period".
 *
 * @property integer $period_id
 * @property integer $task_id
 * @property integer $start
 * @property integer $end
 * @property integer $length
 */
class Period extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vega_period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'start', 'end', 'length'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'period_id' => 'Period ID',
            'task_id' => 'Task ID',
            'start' => 'Start',
            'end' => 'End',
            'length' => 'Length',
        ];
    }
}
