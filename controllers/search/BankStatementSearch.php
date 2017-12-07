<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankStatement;

/**
 * BankStatementSearch represents the model behind the search form about `app\models\BankStatement`.
 */
class BankStatementSearch extends BankStatement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flow_type', 'payment_type', 'account_id', 'author_id', 'status'], 'integer'],
            [['code', 'created', 'updated', 'note'], 'safe'],
            [['amount', 'amount_vat', 'vat'], 'number'],
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
        $query = BankStatement::find();

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
            'flow_type' => $this->flow_type,
            'payment_type' => $this->payment_type,
            'account_id' => $this->account_id,
            'amount' => $this->amount,
            'amount_vat' => $this->amount_vat,
            'vat' => $this->vat,
            'author_id' => $this->author_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
