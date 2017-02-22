<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DbconnectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dbconnection-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'db_id') ?>

    <?= $form->field($model, 'db_host') ?>

    <?= $form->field($model, 'db_username') ?>

    <?= $form->field($model, 'db_password') ?>

    <?= $form->field($model, 'db_database') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
