<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Statistic;

/**
 * common\models\StatisticSearch represents the model behind the search form about `common\models\Statistic`.
 */
 class StatisticSearch extends Statistic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['access_time', 'user_ip', 'user_host', 'path_info', 'query_string'], 'safe'],
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
        $query = Statistic::find();

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
            'user_id' => $this->user_id,
            'access_time' => $this->access_time,
        ]);

        $query->andFilterWhere(['like', 'user_ip', $this->user_ip])
            ->andFilterWhere(['like', 'user_host', $this->user_host])
            ->andFilterWhere(['like', 'path_info', $this->path_info])
            ->andFilterWhere(['like', 'query_string', $this->query_string]);

        return $dataProvider;
    }
}
