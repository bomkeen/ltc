<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/////////////////
use yii\helpers\Json;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
/////////////
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Chospital;
use dektrium\user\models\Profile;
use app\models\CinstypeOld;
/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller {

    public $enableCsrfValidation = false;

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
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                 ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new Person();

        if ($model->load(Yii::$app->request->post())) {
            /// if เก็บ name ที่อยู่////////////
            if (Yii::$app->request->isPost) {
                $pro = \Yii::$app->db->createCommand("SELECT PROVINCE_NAME from province WHERE PROVINCE_CODE=$model->chwpart")->queryAll();
                foreach ($pro as $p) {
                    $pro_name = $p['PROVINCE_NAME'];
                }
                $amp = \Yii::$app->db->createCommand("SELECT AMPHUR_NAME  from amphur WHERE AMPHUR_CODE=$model->amppart")->queryAll();
                foreach ($amp as $a) {
                    $ampart_name = $a['AMPHUR_NAME'];
                }
                $tam = \Yii::$app->db->createCommand("SELECT DISTRICT_NAME  from district WHERE DISTRICT_CODE
=$model->tmbpart")->queryAll();
                foreach ($tam as $t) {
                    $tambon_name = $t['DISTRICT_NAME'];
                }
                $ptnamesql = \Yii::$app->db->createCommand("SELECT instype_name from cinstype_old WHERE id_instype=$model->ptype")->queryAll();
                foreach ($ptnamesql as $pt) {
                    $ptname = $pt['instype_name'];
                }
                $hc = \Yii::$app->db->createCommand("SELECT hospcode,hospcode_name FROM profile WHERE user_id=".\Yii::$app->user->identity->getId())->queryAll();
                foreach ($hc as $hcs) {
                    $hospcode = $hcs['hospcode'];
                }
                $user = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one(); 
                /////ชุดเก็บวันเกิดคำนวณอายุฝ/////
                $date_post = $model->birth_date;
                $date_now = (int) date('Y') + 543;
                $dd = substr($date_post, 0, 4);
                $age_y = ((int) $date_now - (int) $dd);
                /////ชุดเก็บวันเกิดคำนวณอายุฝ/////
                //$hcode= Profile::find()->select('hospcode')->where(['user_id'=>\Yii::$app->user->identity->getId()])->all();
            }
            /// END if เก็บ name ที่อยู่////////////
            $model->tambon = $tambon_name;
            $model->ampart = $ampart_name;
            $model->province = $pro_name;
            $model->update_date = date('Y-m-d');
            $model->update_user=Yii::$app->user->identity->getId();
            $model->age_now = $age_y;
            $model->hcode=$hospcode;
            $model->hname=$user->hospcode_name;
            $model->ptname=$ptname;
            $model->save();
            return $this->redirect(['index', 'id' => $model->cid]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id) {
        $pro = '';
        $model = $this->findModel($id);
        $amppart = ArrayHelper::map($this->getAmphur($model->chwpart), 'id', 'name');
        $tmbpart = ArrayHelper::map($this->getDistrict($model->amppart), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            /// if เก็บ name ที่อยู่////////////
            if (Yii::$app->request->isPost) {
                $pro = \Yii::$app->db->createCommand("SELECT PROVINCE_NAME from province WHERE PROVINCE_CODE=$model->chwpart")->queryAll();
                foreach ($pro as $p) {
                    $pro_name = $p['PROVINCE_NAME'];
                }
                $amp = \Yii::$app->db->createCommand("SELECT AMPHUR_NAME  from amphur WHERE AMPHUR_CODE=$model->amppart")->queryAll();
                foreach ($amp as $a) {
                    $ampart_name = $a['AMPHUR_NAME'];
                }
                $tam = \Yii::$app->db->createCommand("SELECT DISTRICT_NAME  from district WHERE DISTRICT_CODE
=$model->tmbpart")->queryAll();
                foreach ($tam as $t) {
                    $tambon_name = $t['DISTRICT_NAME'];
                }
                  $ptnamesql = \Yii::$app->db->createCommand("SELECT instype_name from cinstype_old WHERE id_instype=$model->ptype")->queryAll();
                foreach ($ptnamesql as $pt) {
                    $ptname = $pt['instype_name'];
                }
            }
            /// END if เก็บ name ที่อยู่////////////
            $model->tambon = $tambon_name;
            $model->ampart = $ampart_name;
            $model->province = $pro_name;
            $model->update_date = date('Y-m-d');
            $model->update_user=Yii::$app->user->identity->getId();
            $model->ptname=$ptname;
            $model->save();

            return $this->redirect(['view', 'id' => $model->cid]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'amppart' => $amppart,
                        'tmbpart' => $tmbpart
            ]);
        }
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = $this->getAmphur($cat_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getAmphur($id) {
        $datas = Amphur::find()->where(['PROVINCE_CODE' => $id])->all();
        return $this->MapData($datas, 'AMPHUR_CODE', 'AMPHUR_NAME');
    }

    protected function getDistrict($id) {
        $datas = District::find()->where(['AMPHUR_CODE' => $id])->all();
        return $this->MapData($datas, 'DISTRICT_CODE', 'DISTRICT_NAME');
    }

    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

}
