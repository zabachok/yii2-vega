<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zabachok\vega\models\Task */

$this->title = 'Изменение: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'task_id' => $model->task_id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
