<?php

namespace app\controllers;

use Yii;
use app\models\Caremanager;
use app\models\CaremanagerScarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use dektrium\user\models\Profile;
/**
 * CaremanagerController implements the CRUD actions for Caremanager model.
 */
class CaremanagerController extends Controller
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
     * Lists all Caremanager models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaremanagerScarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Caremanager();
 $searchModel = new CaremanagerScarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) ) {
            
            $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
            $model->hcode=$user->hospcode;
            $model->create_by=Yii::$app->user->identity->getId();
             $model->save();
             $model = new Caremanager();
//            return $this->redirect(['index', 'id' => $model->id]);
        } 
        $model->status='Y';
            return $this->render('create', [
                'model' => $model,
                'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        
    }

    /**
     * Updates an existing Caremanager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
             $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
            $model->hcode=$user->hospcode;
            $model->create_by=Yii::$app->user->identity->getId();
             $model->save();
            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Caremanager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the Caremanager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caremanager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caremanager::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
