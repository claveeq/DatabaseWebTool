<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DbconnectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dbconnections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbconnection-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dbconnection', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'db_id',
            'db_host',
            'db_username',
            'db_password',
            'db_database',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
