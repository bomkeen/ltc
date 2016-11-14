<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AssList;
use dektrium\user\models\Profile;

/**
 * AssListScarch represents the model behind the search form about `app\models\AssList`.
 */
class AssListScarch extends AssList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ass_staff_id', 's_d1', 's_d2', 's_d3', 's_d4', 's_d5', 's_d6', 's_d7', 's_d8', 's_d9', 's_d10', 's_sum', 'nhso_score'], 'integer'],
            [['cid', 'hcode', 'create_by', 'create_date'], 'safe'],
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
             
        $query = AssList::find()->andwhere(['hcode'=>$hcode]);

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
            'ass_staff_id' => $this->ass_staff_id,
            'create_date' => $this->create_date,
            's_d1' => $this->s_d1,
            's_d2' => $this->s_d2,
            's_d3' => $this->s_d3,
            's_d4' => $this->s_d4,
            's_d5' => $this->s_d5,
            's_d6' => $this->s_d6,
            's_d7' => $this->s_d7,
            's_d8' => $this->s_d8,
            's_d9' => $this->s_d9,
            's_d10' => $this->s_d10,
            's_sum' => $this->s_sum,
            'nhso_score' => $this->nhso_score,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'hcode', $this->hcode])
            ->andFilterWhere(['like', 'create_by', $this->create_by]);

        return $dataProvider;
    }
}
