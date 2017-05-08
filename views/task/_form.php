<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zabachok\vega\models\Task;
use zabachok\vega\models\Project;

/* @var $this yii\web\View */
/* @var $model zabachok\vega\models\Task */
/* @var $form yii\widgets\ActiveForm */
$projects = Project::find()->select(['name', 'project_id'])->indexBy('project_id')->column();
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'project_id')->dropDownList($projects, ['prompt'=>'Не выбрано']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList(Task::$statuses); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'priority')->dropDownList(Task::$priorities) ?>
        </div>
    </div>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
