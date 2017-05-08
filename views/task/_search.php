<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zabachok\vega\models\Task;
use zabachok\vega\models\Project;

/* @var $this yii\web\View */
/* @var $model zabachok\vega\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */

$projects = Project::find()->select(['name', 'project_id'])->indexBy('project_id')->column();
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-1">
            <?= $form->field($model, 'task_id') ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'project_id')->dropDownList($projects, ['prompt'=>'Не выбрано']) ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->field($model, 'status')->dropDownList(Task::$statuses, ['prompt'=>'Не выбрано']) ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->field($model, 'priority')->dropDownList(Task::$priorities, ['prompt'=>'Не выбрано']) ?>
        </div>
        <div class="col-md-5">
            <?php echo $form->field($model, 'title') ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сбросить', ['/vega/task/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
