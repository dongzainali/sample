<?php

namespace backend\controllers;

use Yii;
use common\models\Service;
use common\models\ServiceSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
       else
       {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
       }
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();

        $model->is_show =1;
        if ($model->load(Yii::$app->request->post()) ) 
        {
            if($model->save())
            {
                if(Yii::$app->request->isAjax)
                {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return ['success'=>'true'];
                }
                return $this->redirect(['index']);
            }
            
        }
        if(Yii::$app->request->isAjax)
        {
             return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
       else
       {
            return $this->render('create', [
                    'model' => $model,
                ]);
       }
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) 
        {
            if($model->save())
            {
                if(Yii::$app->request->isAjax)
                {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return ['success'=>'true'];
                }
                return $this->redirect(['index']);
            }
            
        }
        if(Yii::$app->request->isAjax)
        {
             return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
       else
       {
            return $this->render('update', [
                    'model' => $model,
                ]);
       }
    }

    /**
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}