<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zabachok\vega\models\Task;

/* @var $this yii\web\View */
/* @var $model zabachok\vega\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(Task::$statuses) ?>

    <?= $form->field($model, 'priority')->dropDownList(Task::$priorities) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
