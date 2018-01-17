<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "customer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 *
 * @property \common\models\User $user
 * @property \common\models\CustomerOrder[] $customerOrders
 */
class Customer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['user_id'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'email' => 'Email',
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
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(\common\models\CustomerOrder::className(), ['customer_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\CustomerQuery(get_called_class());
    }
}
