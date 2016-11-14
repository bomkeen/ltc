<?php

namespace app\controllers;

use Yii;
use app\models\Caregiver;
use app\models\CaregiverScarch;
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
use dektrium\user\models\Profile;
use app\models\Province;
use app\models\Amphur;
use app\models\District;

class CaregiverController extends Controller {

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

    /**
     * Lists all Caregiver models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CaregiverScarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caregiver model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Caregiver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Caregiver();
        $searchModel = new CaregiverScarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $profile = Profile::find()->where(['user_id' => \Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
            }
            $model->tmbpart_name = $tambon_name;
            $model->amppart_name = $ampart_name;
            $model->chwpart_name = $pro_name;
            $model->addressid = $model->tmbpart . $model->moo;
            $model->save();
            return $this->redirect(['create']);
        } else {
            $model->status='Y';
            return $this->render('create', [
                        'model' => $model,
                        'profile' => $profile
                        ,'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Caregiver model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
  $amppart = ArrayHelper::map($this->getAmphur($model->chwpart), 'id', 'name');
        $tmbpart = ArrayHelper::map($this->getDistrict($model->amppart), 'id', 'name');
         $profile = Profile::find()->where(['user_id' => \Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
            }
            $model->tmbpart_name = $tambon_name;
            $model->amppart_name = $ampart_name;
            $model->chwpart_name = $pro_name;
            $model->addressid = $model->tmbpart . $model->moo;
            $model->save();
            return $this->redirect(['create']);
        } else {
            return $this->render('update', [
                        'model' => $model, 'amppart' => $amppart, 'tmbpart' => $tmbpart
                        , 'profile' => $profile
            ]);
        }
    }

    /**
     * Deletes an existing Caregiver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caregiver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caregiver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Caregiver::findOne($id)) !== null) {
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
