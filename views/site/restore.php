<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>
<div class="restore">

    <?php $form = ActiveForm::begin(); ?>
<!-- //Alerts -->
        <div class="alert alert-warning" id="server-warning">
            <strong>Warning!</strong> Please select a Server.
        </div>
        <div class="alert alert-warning" id="database-warning">
            <strong>Warning!</strong> Please select a Database.
        </div>
        
    <h4>Server</h4>
    <div id="dropdown_status"></div>
    <?= Html::activeDropDownList($model_servers, 'db_id',$items_servers,['prompt'=>'Select Server', 'class' => 'form-control', 'id' => 'server_restore']) ?>

    <div id='retrieving_database' style="padding:15px 0;">
        <div class="progress">
             <div class="progress-bar progress-bar-striped active" role="progressbar"
                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            </div>
        </div>
    </div>    
    <div id = 'dropdown_hide'>
        <h4>Database</h4>

        <?= Html::activeDropDownList($model_databases, 'db_id',$items_databases,['prompt'=>'Select Database', 'class' => 'form-control', 'id' => 'database_restore']) ?>
    </div> 
    <div id='status_restore'></div>
    
    <div style="padding:15px 0;">
        <?= Html::button('Restore', ['class' => 'form-control btn btn-success', 'id' => 'restore']) ?>
    </div>
        <?= Html::input("hidden",null, $model->history_id, ['class' => 'form-control', 'id' => 'history_id'])?>
        <?php ActiveForm::end(); ?>
    </div>
