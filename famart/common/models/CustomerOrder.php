<?php

namespace common\models;

use Yii;
use \common\models\base\CustomerOrder as BaseCustomerOrder;

/**
 * This is the model class for table "customer_order".
 */
class CustomerOrder extends BaseCustomerOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
        ]);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->customer_id = Yii::$app->user->identity->customer->id;

        return true;
    }
	
}
