<?php

namespace app\controllers;

use Yii;
use app\models\Dbconnection;
use app\models\DbconnectionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
/**
 * DbdatabaseController implements the CRUD actions for Dbconnection model.
 */
class DbdatabaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dbconnection models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new DbconnectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dbconnection model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dbconnection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dbconnection();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this -> goback();
           // return $this->redirect(['view', 'id' => $model->db_host]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dbconnection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel('$id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->db_host]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dbconnection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $post = Yii::$app->request->post();
        $this->findModel($post['db_id'])->delete(); 
        //print_r($post); 
        // print_r($data);
        //exit;
        // $this->findModel($data->db_id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Dbconnection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dbconnection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dbconnection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionConnect()
    {
        $post = Yii::$app->request->post();
        // print_r( $post);
 
        $model = $this->findModel($post['db_id']); 
        $Dbconnection = new Dbconnection();
        $items_servers = $Dbconnection -> dbconnect($model); 
        
        //print_r($populate_Dbconnection);
        // if ($Dbconnection -> dbconnect($model);) 
        // {
        //     Yii::$app->session->setFlash('contactFormSubmitted');

        //     return $this->refresh();
        // }
        // print_r($Dbconnectinon);
        // exit;
        // echo "<pre>";
        // print_r($model);
        // exit;
        //  $db_populate = $model->dbconnect();
        //  $model = $this->findModel($post);
        // print_r($model);
        // exit;
        // return $this->render('view', [
        // 'model' => $this->$model
        // ]);

           
    }
}
