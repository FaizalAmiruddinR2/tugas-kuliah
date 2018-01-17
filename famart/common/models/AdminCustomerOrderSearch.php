<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomerOrder;

/**
 * common\models\AdminCustomerOrderSearch represents the model behind the search form about `common\models\CustomerOrder`.
 */
 class AdminCustomerOrderSearch extends CustomerOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id'], 'integer'],
            [['date'], 'safe'],
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
        $query = CustomerOrder::find();

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
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
