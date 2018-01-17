<?php

namespace common\models;

use Yii;
use \common\models\base\OrderItem as BaseOrderItem;

/**
 * This is the model class for table "order_item".
 */
class OrderItem extends BaseOrderItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['order_id', 'item_id', 'qty'], 'required'],
            [['order_id', 'item_id', 'qty'], 'integer']
        ]);
    }
	
}
