<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dbconnection */

$this->title = 'Update Dbconnection: ' . $model->db_id;
$this->params['breadcrumbs'][] = ['label' => 'Dbconnections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->db_id, 'url' => ['view', 'id' => $model->db_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dbconnection-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
