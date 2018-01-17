<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "order_item".
 *
 * @property integer $order_id
 * @property integer $item_id
 * @property integer $qty
 *
 * @property \common\models\CustomerOrder $order
 * @property \common\models\Item $item
 */
class OrderItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'item_id', 'qty'], 'required'],
            [['order_id', 'item_id', 'qty'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'qty' => 'Qty',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\common\models\CustomerOrder::className(), ['id' => 'order_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(\common\models\Item::className(), ['id' => 'item_id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\OrderItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\OrderItemQuery(get_called_class());
    }
}
