<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ssurveystaff;

/**
 * SsurveystaffSearch represents the model behind the search form about `app\models\Ssurveystaff`.
 */
class SsurveystaffSearch extends Ssurveystaff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'staff_type_id'], 'integer'],
            [['pname', 'fname', 'lname', 'cid', 'sex', 'birth_date', 'create_by', 'hcode','status'], 'safe'],
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
        $query = Ssurveystaff::find();

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
            'staff_type_id' => $this->staff_type_id,
            'birth_date' => $this->birth_date,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'create_by', $this->create_by])
            ->andFilterWhere(['like', 'status', $this->status])    
            ->andFilterWhere(['like', 'hcode', $this->hcode]);

        return $dataProvider;
    }
}
