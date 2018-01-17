<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Item;

/**
 * common\models\ItemSearch represents the model behind the search form about `common\models\Item`.
 */
 class ItemSearch extends Item
{
    public $q;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        $this->load($params);
        $this->q = $params['q'];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'name', $this->q])
            ->orFilterWhere(['like', 'stock', $this->q])
            ->orFilterWhere(['like', 'price', $this->q]);

        return $dataProvider;
    }
}
