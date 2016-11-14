<?php

namespace app\controllers;

use Yii;
use app\models\AssList;
use app\models\AssListScarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AssSearch;
use app\models\Person;
use app\models\Ssurveystaff;

/**
 * AssListController implements the CRUD actions for AssList model.
 */
class AssListController extends Controller {

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

    /**
     * Lists all AssList models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AssSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRs($id) {
        $model = AssList::findOne($id);
        $person = Person::find()->where(['cid' => $model->cid])->one();

         if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $person->nhso_score_staff_id = $model->ass_staff_id;
            $person->nhso_score = $model->nhso_score;
            $person->nhso_score_date = date('Y-m-d');
            $person->save();
            return $this->redirect(['list', 'id' => $model->cid]);
        } else {
          return $this->render('rs', [
                    'model' => $model,
                    'person' => $person
        ]);
        }
        
       
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id, $cid) {
        $this->findModel($id)->delete();


        return $this->redirect(['list', 'id' => $cid]);
    }

    public function actionList($id) {
        $searchModel = new AssListScarch(['cid' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $person = Person::findOne($id);
        return $this->render('list', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'person' => $person
        ]);
    }

    public function actionCreate($id) {
        $person = Person::findOne($id);
        $model = new AssList;
        $staff= Ssurveystaff::find()->where(['id'=>$person->survey_staff_id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->isPost) {
                $sum = ($model->s_d1 + $model->s_d2 + $model->s_d3 + $model->s_d4 + $model->s_d5 + $model->s_d6 + $model->s_d7 + $model->s_d8 + $model->s_d9 + $model->s_d10);
            }
            $model->create_by = Yii::$app->user->identity->getId();
            $model->create_date = date('Y-m-d');
            $model->s_sum = $sum;
            $model->save();
            $person->ass_staff_id = $model->ass_staff_id;
            $person->ass_score = $sum;
            $person->ass_date = $model->create_date;
            $person->save();
            if($sum>12){
                 return $this->redirect(['index']);
            }  else {
                 return $this->redirect(['rs', 'id' => $model->id]);
            }
           
        } else {
            return $this->render('create', [
                        'cid' => $id,
                        'person' => $person,
                        'model' => $model,
                'staff'=>$staff,
            ]);
        }
    }

    public function actionEdit($id, $cid) {
        $person = Person::findOne($cid);
        $model = AssList::findOne($id);
        $staff= Ssurveystaff::find()->where(['id'=>$person->survey_staff_id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->isPost) {
                $sum = ($model->s_d1 + $model->s_d2 + $model->s_d3 + $model->s_d4 + $model->s_d5 + $model->s_d6 + $model->s_d7 + $model->s_d8 + $model->s_d9 + $model->s_d10);
            }
            $model->create_by = Yii::$app->user->identity->getId();
            $model->create_date = date('Y-m-d');
            $model->s_sum = $sum;
            $model->save();
            $person->ass_staff_id = $model->ass_staff_id;
            $person->ass_score = $sum;
            $person->ass_date = $model->create_date;
            $person->save();
             if($sum>12){
                 return $this->redirect(['list','id'=>$model->cid]);
            }  else {
            return $this->redirect(['ass-list/rs', 'id' => $model->id]);
            }
        } else {
            return $this->render('edit', [
                        //'cid'=>$id,
                        'person' => $person,
                        'model' => $model,
                'staff'=>$staff,
            ]);
        }
    }

    protected function findModel($id) {
        if (($model = AssList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
