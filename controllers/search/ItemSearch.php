<?php

namespace app\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form about `app\models\Item`.
 */
class ItemSearch extends Item
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'group_id', 'measures', 'state', 'status', 'losses_clear', 'losses_cook', 'losses_stew', 'losses_fry', 'losses_bake', 'weight'], 'integer'],
			[['title', 'created', 'updated', 'note'], 'safe'],
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
		$query = Item::find();

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
			'group_id' => $this->group_id,
			'measures' => $this->measures,
			'state' => $this->state,
			'created' => $this->created,
			'updated' => $this->updated,
			'status' => $this->status,
			'losses_clear' => $this->losses_clear,
			'losses_cook' => $this->losses_cook,
			'losses_fry' => $this->losses_fry,
			'losses_stew' => $this->losses_stew,
			'losses_bake' => $this->losses_bake,
			'weight' => $this->weight,
		]);

		$query->andFilterWhere(['like', 'title', $this->title])
			->andFilterWhere(['like', 'note', $this->note]);

		return $dataProvider;
	}
}
