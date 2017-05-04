<?php

use yii\helpers\Html;
use yii\grid\GridView;
use zabachok\vega\models\Task;

/* @var $this yii\web\View */
/* @var $searchModel zabachok\vega\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'task_id',
            'title',
            'created_at',
            'updated_at',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Task::$statuses[$model->status];
                },
            ],
            [
                'attribute' => 'priority',
                'value' => function ($model) {
                    return Task::$priorities[$model->priority];
                },
            ],
            // 'owner',
            // 'worker',
            // 'type',
            // 'time:datetime',
            // 'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
