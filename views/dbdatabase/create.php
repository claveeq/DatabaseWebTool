<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dbconnection */

$this->title = 'Create Connection';
$this->params['breadcrumbs'][] = ['label' => 'Dbconnections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbconnection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
