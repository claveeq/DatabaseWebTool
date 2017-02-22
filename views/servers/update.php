<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servers */

$this->title = 'Update Servers: ' . $model->ip_id;
$this->params['breadcrumbs'][] = ['label' => 'Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ip_id, 'url' => ['view', 'id' => $model->ip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
