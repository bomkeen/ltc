<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caregiver;
use dektrium\user\models\Profile;

/**
 * CaregiverScarch represents the model behind the search form about `app\models\Caregiver`.
 */
class CaregiverScarch extends Caregiver
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_by'], 'integer'],
            [['pname', 'fname', 'lname', 'cid', 'sex', 'birth_date', 'hcode', 'education', 'train_name', 'train_name_other', 'train_dep', 'train_date', 'exp', 'moo', 'tmbpart', 'tmbpart_name', 'amppart', 'amppart_name', 'chwpart', 'chwpart_name', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
         $hcode= Profile::find()->select('hospcode')->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();
             $query = Caregiver::find()->andwhere(['hcode'=>$hcode]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birth_date' => $this->birth_date,
            'create_by' => $this->create_by,
            'train_date' => $this->train_date,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'hcode', $this->hcode])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'train_name', $this->train_name])
            ->andFilterWhere(['like', 'train_name_other', $this->train_name_other])
            ->andFilterWhere(['like', 'train_dep', $this->train_dep])
            ->andFilterWhere(['like', 'exp', $this->exp])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'tmbpart_name', $this->tmbpart_name])
            ->andFilterWhere(['like', 'amppart', $this->amppart])
            ->andFilterWhere(['like', 'amppart_name', $this->amppart_name])
            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
            ->andFilterWhere(['like', 'chwpart_name', $this->chwpart_name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
