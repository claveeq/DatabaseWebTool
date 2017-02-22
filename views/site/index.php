<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider
    <?php echo $this->render('_search', ['model' => $searchModel]); ?> */


// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="servers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- //Alerts -->
                <div class="alert alert-warning" id="server-warning">
                    <strong>Warning!</strong> Please select a Server.
                </div>
                <div class="alert alert-warning" id="database-warning">
                    <strong>Warning!</strong> Please select a Database.
                </div>
    <p>
        <?= Html::button('Add Servers', ['value' => Url::to('index.php?r=dbdatabase/create'),'class' => 'btn btn-secondary', 'id' => 'toCreateView']) ?>
    </p>


  <div id="dialog-confirm"></div>
    <?php 
        Modal::begin([
           // 'header' => '<h1>header</h1>',
            'id' => 'modal',
            'size' => 'modal-sm',
            ]);
        echo "<div id= 'modalContent'></div>";
        Modal::end();
    ?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <h5>Server</h2>
    <div id="dropdown_status"></div>
    <div class="row">
        <div class="col-xs-12 col-md-10">
                       <?= Html::activeDropDownList($model_servers, 'db_id',$items_servers,['value' => Url::to('index.php?r=site/users'), 'prompt'=>'Select Server', 'class' => 'form-control', 'id' => 'servers']) ?>
        </div>
        <div class="col-xs-12 col-md-2">
            <?= Html::button('Delete', ['class' => 'btn btn-danger form-control', 'id' => 'deleteServer']) ?>
        </div>  
    </div>
    

    <div id='retrieving_database' style="padding:15px 0;">
        <div class="progress">
             <div class="progress-bar progress-bar-striped active" role="progressbar"
                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            </div>
        </div>
    </div>    

    <div id = 'dropdown_hide'>
        <h5>Database</h2>
        <?= Html::activeDropDownList($model_databases, 'db_id',$items_databases,['prompt'=>'Select Database', 'class' => 'form-control']) ?>  
    </div>  

    <div id='status_restore'></div>
    <div style="padding:15px 0;">
        <?= Html::button('Dump', ['class' => 'form-control btn btn-primary', 'id' => 'dump']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <div id='status'>
        <div class="progress">
             <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                Dumping
            </div>
        </div>
    </div>    

</div>
<?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'history_gridview',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'history_id',
            'history_date',
            'history_server_name',
            'history_db_name',
            'history_dumpfile_loc',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{link}',
                'buttons' => [
                    'id' => 'restore',
                    'link' => function ($url,$model,$key) {
                            return Html::a('Restore', ['restore', 'id'=>$model->history_id], ['class' => 'form-control btn btn-info toRestoreView']);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>

<!-- <div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
 -->