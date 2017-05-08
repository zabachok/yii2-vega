<?php
/**
 * Created by PhpStorm.
 * User: zabachok
 * Date: 08.05.17
 * Time: 14:47
 */

use zabachok\vega\models\Task;

/* @var $model zabachok\vega\models\TaskLog */
/* @var $task zabachok\vega\models\Task */

switch ($model->param) {
    case 'status':
        $from = Task::$statuses[$model->from];
        $to = Task::$statuses[$model->to];
        break;
    case 'priority':
        $from = Task::$priorities[$model->from];
        $to = Task::$priorities[$model->to];
        break;
    case 'description':
        $from = strlen($model->from);
        $to = strlen($model->to);
        break;
    default:
        $from = $model->from;
        $to = $model->to;
        break;
}

echo '<b>' . Yii::$app->formatter->asTime($model->created_at) . '</b> Изменено поле ' . $task->getAttributeLabel($model->param) . ' c <i>' . $from . '</i> на <i>' . $to . '</i>';

echo '<br>';