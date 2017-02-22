<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'history_server_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history_db_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history_dumpfile_loc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
