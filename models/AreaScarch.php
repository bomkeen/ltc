<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Area;

use dektrium\user\models\Profile;
/**
 * AreaScarch represents the model behind the search form about `app\models\Area`.
 */
class AreaScarch extends Area
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id_create'], 'integer'],
            [['hcode', 'addressid', 'moo', 'moo_name'
                , 'tmbpart', 'tmbpart_name', 'amppart'
                , 'amppart_name', 'chwpart', 'chwpart_name'
                , 'hcode_name'
                , 'opt_code', 'opt_code_name'], 'safe'],
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
    $query = Area::find()->andwhere(['hcode'=>$hcode]);

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
            'user_id_create' => $this->user_id_create,
        ]);

        $query->andFilterWhere(['like', 'hcode', $this->hcode])
            ->andFilterWhere(['like', 'addressid', $this->addressid])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'moo_name', $this->moo_name])
            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
            ->andFilterWhere(['like', 'tmbpart_name', $this->tmbpart_name])
            ->andFilterWhere(['like', 'amppart', $this->amppart])
            ->andFilterWhere(['like', 'amppart_name', $this->amppart_name])
            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
            ->andFilterWhere(['like', 'chwpart_name', $this->chwpart_name])
            ->andFilterWhere(['like', 'hcode_name', $this->hcode_name])
            ->andFilterWhere(['like', 'opt_code', $this->opt_code])
            ->andFilterWhere(['like', 'opt_code_name', $this->opt_code_name]);

        return $dataProvider;
    }
}
