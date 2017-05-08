<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zabachok\vega\models\Task;

/* @var $this yii\web\View */
/* @var $model zabachok\vega\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\zabachok\vega\assets\VegaAsset::register($this);
?>
<div class="task-view">


    <p class="pull-right">
        <?= Html::a('Изменить', ['update', 'id' => $model->task_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->task_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h1><?= Html::encode($this->title) ?>
        <small><?= $model->project->name ?></small>
    </h1>

    <div class="row">
        <div class="col-md-8">
            <?= \Yii::$app->formatter->asParagraphs($model->description) ?>
        </div>
        <div class="col-md-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'created_at:datetime',
                    'updated_at:datetime',
                    'closed_at:datetime',
                    [
                        'label' => $model->getAttributeLabel('status'),
                        'value' => Task::$statuses[$model->status],
                    ],
                    [
                        'label' => $model->getAttributeLabel('priority'),
                        'value' => Task::$priorities[$model->priority],
                    ],
                ],
                'options' => ['class' => 'table table-striped table-bordered detail-view table-condensed']
            ]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Таймер</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="btn-group" role="group">
                        <?php if (in_array($model->status,
                            [0, 2])) echo Html::a('<i class="fa fa-play" aria-hidden="true"></i>',
                            ['timer', 'task_id' => $model->task_id, 'action' => 'play'],
                            ['class' => 'btn btn-success btn-lg']) ?>

                        <?php if (in_array($model->status,
                            [1])) echo Html::a('<i class="fa fa-pause" aria-hidden="true"></i>',
                            ['timer', 'task_id' => $model->task_id, 'action' => 'pause'],
                            ['class' => 'btn btn-warning btn-lg']) ?>

                        <?php if (in_array($model->status,
                            [1])) echo Html::a('<i class="fa fa-stop" aria-hidden="true"></i>',
                            ['timer', 'task_id' => $model->task_id, 'action' => 'stop'],
                            ['class' => 'btn btn-danger btn-lg']) ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php if (!empty($model->playPeriod)): ?>
                        <div id="task-duration" class="text-success"
                             style="display: inline-block;font-size: 35px; line-height: 33px;"
                             data-start="<?= $model->playPeriod->start ?>" data-time="<?= time() ?>">
                        </div>
                        <div id="task-full-duration" class="text-info" data-length="<?= $model->periodsLength ?>"></div>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <?php
                    foreach ($model->periods as $period) {
                        /** @var \zabachok\vega\models\Period $period */
                        echo '<b>' . \Yii::$app->formatter->asDate($period->start) . '</b> ';
                        if (!empty($period->end)) {
                            echo ' <span class="label label-default">' . \Yii::$app->formatter->asDuration($period->length) . '</span>';
                            echo ' <small>' . \Yii::$app->formatter->asTime($period->start);
                            echo ' - ' . \Yii::$app->formatter->asTime($period->end) . '</small>';
                        } else {
                            echo ' <small>' . \Yii::$app->formatter->asTime($period->start) . '</small>';
                        }
                        if (empty($period->comment)) {
                            echo '<br>';
                        } else {
                            echo '<div class="text-muted" style="padding-left: 20px;">';
                            echo \Yii::$app->formatter->asParagraphs($period->comment);
                            echo '</div>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Лог</h2>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (!empty($model->log)) {
                        $time = 0;
                        foreach ($model->log as $item) {
                            if ($time != date('Y-m-d H', $item->created_at)) {
                                $time = date('Y-m-d H', $item->created_at);
                                echo '<b>' . \Yii::$app->formatter->asDate($item->created_at) . '</b><br>';
                            }
                            echo $this->render('_log', ['model' => $item, 'task' => $model]);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
