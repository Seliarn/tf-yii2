<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientContractor;

/**
 * ClientContractorSearch represents the model behind the search form about `app\models\ClientContractor`.
 */
class ClientContractorSearch extends ClientContractor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['title', 'company', 'director', 'manager', 'billing_card', 'edrpou_code', 'inn', 'billing_address', 'email_1', 'email_2', 'email_3', 'alt_emails', 'phone_1', 'phone_2', 'phone_3', 'alt_phones', 'address', 'note', 'created', 'updated'], 'safe'],
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
        $query = ClientContractor::find();

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
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'manager', $this->manager])
            ->andFilterWhere(['like', 'billing_card', $this->billing_card])
            ->andFilterWhere(['like', 'edrpou_code', $this->edrpou_code])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'billing_address', $this->billing_address])
            ->andFilterWhere(['like', 'email_1', $this->email_1])
            ->andFilterWhere(['like', 'email_2', $this->email_2])
            ->andFilterWhere(['like', 'email_3', $this->email_3])
            ->andFilterWhere(['like', 'alt_emails', $this->alt_emails])
            ->andFilterWhere(['like', 'phone_1', $this->phone_1])
            ->andFilterWhere(['like', 'phone_2', $this->phone_2])
            ->andFilterWhere(['like', 'phone_3', $this->phone_3])
            ->andFilterWhere(['like', 'alt_phones', $this->alt_phones])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
