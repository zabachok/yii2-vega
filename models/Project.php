<?php

namespace zabachok\vega\models;

use Yii;

/**
 * This is the model class for table "vega_project".
 *
 * @property integer $project_id
 * @property integer $created_at
 * @property string $color
 * @property integer $status
 */
class Project extends \yii\db\ActiveRecord
{
    public static $statuses = [
        0 => 'Открыт',
        1 => 'В архиве',
        2 => 'Удален',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vega_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'status'], 'integer'],
            [['color'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'created_at' => 'Created At',
            'color' => 'Color',
            'status' => 'Status',
        ];
    }
}
