<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_customer', 'is_contractor', 'status'], 'integer'],
            [['first_name', 'last_name', 'username', 'birthday', 'title', 'company', 'director', 'manager', 'billing_card', 'edrpou_code', 'inn', 'billing_address', 'email', 'alt_emails', 'phone', 'alt_phones', 'address', 'note', 'created', 'updated'], 'safe'],
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
        $query = Client::find();

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
            'is_customer' => $this->type,
            'is_contractor' => $this->type,
            'birthday' => $this->birthday,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'manager', $this->manager])
            ->andFilterWhere(['like', 'billing_card', $this->billing_card])
            ->andFilterWhere(['like', 'edrpou_code', $this->edrpou_code])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'billing_address', $this->billing_address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alt_emails', $this->alt_emails])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'alt_phones', $this->alt_phones])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
