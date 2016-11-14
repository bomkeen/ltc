<?php

namespace app\controllers;
use yii;
use app\models\Person;
use app\models\PersonSearch;
use app\models\SurveyList;
use app\models\SurveyListScarch;

class SurveyController extends \yii\web\Controller
{
    public function actionIndex()
    {
         $searchModel = new PersonSearch([]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                 ]);
    }
    public function actionUpdate($id) {
        $person=  Person::findOne($id);
        $model=new SurveyList;
           if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->isPost) {
 $sum=($model->s_d1+$model->s_d2+$model->s_d3+$model->s_d4+$model->s_d5+$model->s_d6+$model->s_d7+$model->s_d8+$model->s_d9+$model->s_d10);
            }
            $model->create_by=Yii::$app->user->identity->getId();
            $model->create_date=date('Y-m-d');
            $model->s_sum=  $sum;
            $model->save();
             $person->survey_staff_id=$model->survey_staff_id;
            $person->survey_score=$sum;
            $person->survey_date=$model->create_date;
            $person->save();
           return $this->redirect(['survey/list','id'=>$model->cid]);
        } else {
        return $this->render('update',[
            'cid'=>$id,
            'person'=>$person,
            'model'=>$model,
            
        ]);
        }
    }
    
    public function actionList($id)
    {
        $searchModel = new SurveyListScarch(['cid'=>$id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$person=  Person::findOne($id);
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person'=>$person
        ]);
    }
    
      public function actionEdit($id,$cid) {
        $person=  Person::findOne($cid);
        $model=  SurveyList::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->isPost) {
 $sum=($model->s_d1+$model->s_d2+$model->s_d3+$model->s_d4+$model->s_d5+$model->s_d6+$model->s_d7+$model->s_d8+$model->s_d9+$model->s_d10);
            }
            $model->create_by=Yii::$app->user->identity->getId();
            $model->create_date=date('Y-m-d');
            $model->s_sum=  $sum;
            $model->save();
             $person->survey_staff_id=$model->survey_staff_id;
            $person->survey_score=$sum;
            $person->survey_date=$model->create_date;
            $person->save();
           return $this->redirect(['survey/list','id'=>$model->cid]);
        } else {
        return $this->render('edit',[
            //'cid'=>$id,
            'person'=>$person,
            'model'=>$model,
        ]);
        }
    }
    
    public function actionRs($id) {
        $model=  SurveyList::findOne($id);
        $person= Person::find()->where(['cid'=>$model->cid])->one();
        return $this->render('rs',[
            'model'=>$model,
            'person'=>$person
            
        ]);
    }
}
