<?php

namespace app\controllers;

use Yii;
use app\models\Ssurveystaff;
use app\models\SsurveystaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use dektrium\user\models\Profile;
use app\models\StaffType;

/**
 * SsurveystaffController implements the CRUD actions for Ssurveystaff model.
 */
class SsurveystaffController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new SsurveystaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ssurveystaff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $staff=  StaffType::find()->where(['staff_type_id'=>$model->staff_type_id])->one();
        return $this->render('view', [
            'model' => $model,
            'staff_type'=>$staff->staff_type_name
        ]);
    }

    public function actionCreate()
    {
        $model = new Ssurveystaff();
$searchModel = new SsurveystaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post())  ) {
            
            $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
            $model->hcode=$user->hospcode;
            $model->create_by=Yii::$app->user->identity->getId();
            $model->save();
             $model = new Ssurveystaff();

        } 
        $model->status='Y';
            return $this->render('create', [
                'model' => $model,
                 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
           
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
     * Deletes an existing Ssurveystaff model.
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
     * Finds the Ssurveystaff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ssurveystaff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ssurveystaff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
