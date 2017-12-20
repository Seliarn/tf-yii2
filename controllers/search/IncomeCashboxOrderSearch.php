<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IncomeCashboxOrder;

/**
 * IncomeCashboxOrderSearch represents the model behind the search form about `app\models\IncomeCashboxOrder`.
 */
class IncomeCashboxOrderSearch extends IncomeCashboxOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'operation_id', 'account_id', 'cash_flow_statement_id', 'subconto_id', 'status'], 'integer'],
            [['code', 'note', 'created', 'updated', 'date'], 'safe'],
            [['amount'], 'number'],
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
        $query = IncomeCashboxOrder::find();

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
            'operation_id' => $this->operation_id,
            'account_id' => $this->account_id,
            'cash_flow_statement_id' => $this->cash_flow_statement_id,
            'subconto_id' => $this->subconto_id,
            'amount' => $this->amount,
            'created' => $this->created,
            'updated' => $this->updated,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
