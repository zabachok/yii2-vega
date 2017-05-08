<?php

use yii\helpers\Html;
use yii\grid\GridView;
use zabachok\vega\models\Task;

/* @var $this yii\web\View */
/* @var $searchModel zabachok\vega\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
if (is_null($searchModel->project_id)) {
    $createUri = ['create'];
} else {
    $createUri = ['create', 'project_id' => $searchModel->project_id];
}

?>
    <div class="task-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Task', $createUri, ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
            'columns' => [
                'task_id',
                [
                    'attribute' => 'project_id',
                    'value' => function ($model) {
                        return $model->project->name;
                    },
                ],
                [
                    'attribute' => 'title',
                    'value' => function ($model) {
                        return Html::a($model->title, ['view', 'task_id' => $model->task_id]);
                     },
                    'format' => 'raw',
                ],
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
//                'created_at',
//                'updated_at',
//                'closed_at',
                // 'description:ntext',

            ],
        ]); ?>
    </div>

<?= $this->render('_calendar');