<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Person;
use dektrium\user\models\Profile;
/**
 * PersonSearch represents the model behind the search form about `app\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hcode', 'hname', 'cid', 'pname', 'fname'
                , 'lname', 'sex', 'birth_date', 'age_now', 'ptname', 'hmain', 'hsub', 'addressid', 'house_num', 'tmbpart', 'tambon', 'amppart', 'ampart', 'chwpart', 'province', 'chronic'
                ,'survey_score','survey_date', 'tel', 'ddischarge', 'update_status', 'update_user', 'update_date'], 'safe'],
            [['ptype', 'moo', 'education', 'occupation', 'religion', 'fstatus', 'discharge'], 'integer'],
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
        $query = Person::find()->andwhere(['hcode'=>$hcode]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 1000 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ptype' => $this->ptype,
            'moo' => $this->moo,
            'education' => $this->education,
            'occupation' => $this->occupation,
            'religion' => $this->religion,
            'fstatus' => $this->fstatus,
            'discharge' => $this->discharge,
            'ddischarge' => $this->ddischarge,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'hcode', $this->hcode])
            ->andFilterWhere(['like', 'hname', $this->hname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'birth_date', $this->birth_date])
            ->andFilterWhere(['like', 'age_now', $this->age_now])
            ->andFilterWhere(['like', 'ptname', $this->ptname])
            ->andFilterWhere(['like', 'hmain', $this->hmain])
            ->andFilterWhere(['like', 'hsub', $this->hsub])
            ->andFilterWhere(['like', 'addressid', $this->addressid])
            ->andFilterWhere(['like', 'house_num', $this->house_num])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'tambon', $this->tambon])
            ->andFilterWhere(['like', 'amppart', $this->amppart])
            ->andFilterWhere(['like', 'ampart', $this->ampart])
            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'chronic', $this->chronic])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'update_status', $this->update_status])
            ->andFilterWhere(['like', 'update_user', $this->update_user])
            ->andFilterWhere(['like', 'survey_score', $this->survey_score])
            ->andFilterWhere(['like', 'survey_date', $this->survey_date]);

        return $dataProvider;
    }
}
