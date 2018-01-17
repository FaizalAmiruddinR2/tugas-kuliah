<?php

namespace common\models;

use Yii;
use \common\models\base\Customer as BaseCustomer;

/**
 * This is the model class for table "customer".
 */
class Customer extends BaseCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'email'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['user_id'], 'unique']
        ]);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->user_id = Yii::$app->user->getId();

        return true;
    }
	
}
