<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderItem;

/**
 * common\models\AdminOrderItemSearch represents the model behind the search form about `common\models\OrderItem`.
 */
 class AdminOrderItemSearch extends OrderItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'item_id', 'qty'], 'integer'],
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
        $query = OrderItem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'item_id' => $this->item_id,
            'qty' => $this->qty,
        ]);

        return $dataProvider;
    }
}
