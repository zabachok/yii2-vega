<?php

namespace zabachok\vega\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "vega_project".
 *
 * @property integer $project_id
 * @property integer $created_at
 * @property string $name
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
    public static $colors = [
        'ff0000',
        '00ff00',
        '0000ff',
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
            [['name'], 'string', 'max' => 255],
            ['status', 'default', 'value' => 0],
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
            'name' => 'Имя',
            'color' => 'Color',
            'status' => 'Status',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('UNIX_TIMESTAMP()'),
            ],
        ];
    }
}
