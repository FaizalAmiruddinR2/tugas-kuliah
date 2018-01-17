<?php

namespace common\models;

use Yii;
use \common\models\base\Statistic as BaseStatistic;

/**
 * This is the model class for table "statistic".
 */
class Statistic extends BaseStatistic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['access_time'], 'safe'],
            [['user_ip'], 'string', 'max' => 20],
            [['user_host', 'query_string'], 'string', 'max' => 50],
            [['path_info'], 'string', 'max' => 70]
        ]);
    }
	
}
