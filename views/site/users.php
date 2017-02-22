<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>
<div class="users">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'db_username') ?>
        <?= $form->field($model, 'db_password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary' ,'id' => 'submitUserPass']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- users -->
