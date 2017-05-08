<?php
/**
 * Created by PhpStorm.
 * User: zabachok
 * Date: 08.05.17
 * Time: 16:43
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var \zabachok\vega\models\Period $model */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model) ?>
        <?= $form->field($model, 'comment')->textarea(['rows'=>6, 'maxlength'=>255])?>
        <?= $form->field($model, 'length')?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>