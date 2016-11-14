<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caremanager;
use dektrium\user\models\Profile;

/**
 * CaremanagerScarch represents the model behind the search form about `app\models\Caremanager`.
 */
class CaremanagerScarch extends Caremanager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'staff_type_id', 'create_by'], 'integer'],
            [['pname', 'fname', 'lname', 'cid', 'sex', 'birth_date', 'hcode','status'], 'safe'],
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
        //$query = Person::find()
        
        $query = Caremanager::find()->andwhere(['hcode'=>$hcode]);

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
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'sex', $this->sex])
                ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'hcode', $this->hcode]);

        return $dataProvider;
    }
}
