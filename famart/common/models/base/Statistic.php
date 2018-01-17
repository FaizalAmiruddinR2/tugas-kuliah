<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "statistic".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $access_time
 * @property string $user_ip
 * @property string $user_host
 * @property string $path_info
 * @property string $query_string
 *
 * @property \common\models\User $user
 */
class Statistic extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['access_time'], 'safe'],
            [['user_ip'], 'string', 'max' => 20],
            [['user_host', 'query_string'], 'string', 'max' => 50],
            [['path_info'], 'string', 'max' => 70]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'access_time' => 'Access Time',
            'user_ip' => 'User Ip',
            'user_host' => 'User Host',
            'path_info' => 'Path Info',
            'query_string' => 'Query String',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\StatisticQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\StatisticQuery(get_called_class());
    }
}
