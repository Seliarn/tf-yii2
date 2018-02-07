<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SupplyItem;

/**
 * SupplyItemSearch represents the model behind the search form of `app\models\SupplyItem`.
 */
class SupplyItemSearch extends SupplyItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'supply_id', 'item_id', 'measures', 'created', 'updated', 'status'], 'integer'],
            [['count', 'cost'], 'number'],
            [['note'], 'safe'],
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
        $query = SupplyItem::find();

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
            'supply_id' => $this->supply_id,
            'item_id' => $this->item_id,
            'measures' => $this->measures,
            'count' => $this->count,
            'cost' => $this->cost,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
