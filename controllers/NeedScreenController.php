<?php

namespace app\controllers;

use Yii;
use app\models\NeedScreen;
use app\models\NeedScreenScarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Personneed;
use app\models\Person;

/**
 * NeedScreenController implements the CRUD actions for NeedScreen model.
 */
class NeedScreenController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $searchModel = new Personneed();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionList($id) {
        $searchModel = new NeedScreenScarch(['cid' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $person = Person::findOne($id);
        return $this->render('list',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person'=>$person
        ]);
        
    }

    public function actionView($id,$cid) {
        $person = Person::findOne($cid);
        return $this->render('view', [
        'model' => $this->findModel($id),
            'person'=>$person
        ]);
    }

  
    public function actionPage1($id) {
        $model = new NeedScreen();
        $person = Person::findOne($id);
        $model->scenario = 'page1';
        $page=1;
        if ($model->load(Yii::$app->request->post()) ) {
            $model->create_by = Yii::$app->user->identity->getId();
            $model->create_date = date('Y-m-d');
            $model->save();
        return $this->redirect(['page2', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,'person'=>$person,'page'=>$page
            ]);
        }
    }
     public function actionPage2($id) {
        $model = $this->findModel($id);
        $person = Person::findOne($model->cid);
        $model->scenario = 'page2';
        $model->need1_1ToArray();
        $model->need1_2ToArray();
        $model->need1_3ToArray();
        $model->need1_3_2ToArray();
        $model->need2_1ToArray();
        $model->need2_2ToArray();
        $model->need2_3ToArray();
        $model->need2_4ToArray();
        $model->need2_5ToArray();
        $page=2;
        if ($model->load(Yii::$app->request->post()) ) {
           // $model->create_by = Yii::$app->user->identity->getId();
           // $model->create_date = date('Y-m-d');
            $model->save();
        return $this->redirect(['page3', 'id' => $model->id]);
                 
        } else {
            return $this->render('create', [
                        'model' => $model,'person'=>$person,'page'=>$page
            ]);
        }
    }
     public function actionPage3($id) {
        $model = $this->findModel($id);
        $person = Person::findOne($model->cid);
        $model->scenario = 'page3';
        $model->need1_1ToArray();
        $model->need1_2ToArray();
        $model->need1_3ToArray();
        $model->need1_3_2ToArray();
        $model->need2_1ToArray();
        $model->need2_2ToArray();
        $model->need2_3ToArray();
        $model->need2_4ToArray();
        $model->need2_5ToArray();
        $page=3;
        if ($model->load(Yii::$app->request->post()) ) {
            //$model->create_by = Yii::$app->user->identity->getId();
           // $model->create_date = date('Y-m-d');
            $model->save();
        return $this->redirect(['list', 'id' => $model->cid]);
                 
        } else {
            return $this->render('create', [
                        'model' => $model,'person'=>$person,'page'=>$page
            ]);
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $person = Person::findOne($model->cid);
        $model->need1_1ToArray();
        $model->need1_2ToArray();
        $model->need1_3ToArray();
        $model->need1_3_2ToArray();
        $model->need2_1ToArray();
        $model->need2_2ToArray();
        $model->need2_3ToArray();
        $model->need2_4ToArray();
        $model->need2_5ToArray();
        
         $page=1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['page2', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,'person'=>$person,'page'=>$page
            ]);
        }
    }

 
    public function actionDelete($id,$cid) {
        $this->findModel($id)->delete();
$person = Person::findOne($cid);
        return $this->redirect(['list','id'=>$cid]);
    }

    protected function findModel($id) {
        if (($model = NeedScreen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
