<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dbconnection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dbconnection-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'db_host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'db_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'db_password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
