<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "customer_order".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $date
 *
 * @property \common\models\Customer $customer
 * @property \common\models\OrderItem[] $orderItems
 * @property \common\models\Item[] $items
 */
class CustomerOrder extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_order';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'date' => 'Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\common\models\Customer::className(), ['id' => 'customer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\common\models\OrderItem::className(), ['order_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\common\models\Item::className(), ['id' => 'item_id'])->viaTable('order_item', ['order_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\CustomerOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\CustomerOrderQuery(get_called_class());
    }
}
