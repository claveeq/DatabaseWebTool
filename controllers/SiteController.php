<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Query;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Servers;
use app\models\ServersSearch;
use app\models\Databases;
use app\models\DatabasesSearch;
use app\models\Dbconnection;
use app\models\DbconnectionSearch;
use app\models\History;
use app\models\HistorySearch;
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //Getting server items
        $model_servers = new DbconnectionSearch;     
        $sql = 'SELECT * FROM dbconnection';
        $items_servers = ArrayHelper::map( $model_servers::findBySql($sql)->all(), 'db_id', 'db_host');
        $post = Yii::$app->request->post();
        //getting initial values from local host if null(should be revised)
        if($post == null){
            $post['db_id'] = 1;
        }
         
        $model_databases = $this->findModel($post['db_id']); 
        $Dbconnection = new Dbconnection();
        $items_databases = $Dbconnection; 
        
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // For testing only
        // echo "<pre>";
        // print_r($items_databases);
        // print_r($items_servers);
        // exit;

        return $this->render('index', [
            'model_servers'=>$model_servers,       
            'items_servers'=>$items_servers,

            'model_databases'=>$model_databases,
            'items_databases'=>$items_databases,

            'searchModel' =>$searchModel,
            'dataProvider' =>$dataProvider,
        ]);
    }

    public function actionGetdb(){
        $post = Yii::$app->request->post();
         
        if($post == null){
            echo "<option style = 'visibility: hidden'</option>";
        }else{              
            $model_databases = $this->findModel($post['db_id']); 
            
            $items_databases = $model_databases->dbconnect($model_databases); 
            echo "<option value=''>Select Database</option>";
            foreach ($items_databases as $key => $db) {

               echo "<option value='".$db[0]."'>".$db[0]."</option>";
            }
        }
    }
    public function actionDump(){
        $model = new History();
        $post = Yii::$app->request->post();
 
        $model->history_server_name = $post["history_server_name"];
        $model->history_db_name = $post["history_db_name"];
        $model->history_date = date("Y-m-d-H-m-s");
       // $model->history_dumpfile_loc = $post["history_dumpfile_loc"];
        $model_account = $this->findModel($post['db_id']); 
        //$model->dump($data); 
        $model->history_dumpfile_loc = $model->dump($model_account);
     
        // $model->history_dumpfile_loc = ;
        $model->save();
        return "The Dump has been Successfully Completed!";
       // return $this->redirect(['index']);
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //   return $this->refresh();      
        // }       
        }
    public function actionRestore($id){

        //$model_history = $this->findModel_history($id);
        // echo "<pre>";
        // print_r($model);
        // exit;
        $model = new Dbconnection();
         //Getting server items
        $model_servers = new DbconnectionSearch;     
        $sql = 'SELECT * FROM dbconnection';
        $items_servers = ArrayHelper::map( $model_servers::findBySql($sql)->all(), 'db_id', 'db_host');
        $post = Yii::$app->request->post();
        //getting initial values from local host if null(should be revised)
        if($post == null){
            $post['db_id'] = 1;
        }
         
        $model_databases = $this->findModel($post['db_id']); 
        $Dbconnection = new Dbconnection();
        $items_databases = $Dbconnection; 

        return $this->render('restore', [
            'model_servers'=>$model_servers,       
            'items_servers'=>$items_servers,
            'model_databases'=>$model_databases,
            'items_databases'=>$items_databases,
            'model' => $this->findModel_history($id),
        ]);
    }
    public function actionImport(){  
    $model = new History;
    // $model = new Dbconnection();
    $post = Yii::$app->request->post();
    $model_history = $this->findModel_history($post['history_id']); 
    $model_history->history_server_name = $post['server_restore_text'];
    $model_connection = $this->findModel($post['db_id']); 
    $model_connection->db_database = $post['db_database'];
    $message = $model->restore($model_history, $model_connection);
    return $message; 
        //return $this->redirect(['index']);      
    //$model->db_id = $post["db_id"];

    // $model_databases = $this->findModel($post['db_id']); 
    // $model_history = $this->findModel_history($id);
   // $model->history_server_name = $post["db_server"];
    //getting history model from id

    // echo "<pre>";
    // print_r($model_databases);
    // exit;
    // $model = $this->findModel_history($id);
    }



    public function actionUsers()
    {

        $model = new Dbconnection();

        if ($model->load(Yii::$app->request->post())) {
              if ($model->Dbconnect()) {
                    return $this->goBack();;
                }            
        }
        return $this->renderAjax('users', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) 
        {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionError() 
    {
        if($error=Yii::app()->errorHandler->error)
            if ( CDbException == $error->type) {
               $this->redirect(array("site/error_message")); }
        //  call the parent error handler, but something doesn't feel right about this:
        else
            parent::actionError(); 
    }
    protected function findModel($id)
    {
        if (($model = Dbconnection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModel_history($id)
    {
        if (($model = History::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


