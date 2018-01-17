<?php

namespace common\models;

use Yii;
use \common\models\base\ItemCategory as BaseItemCategory;

/**
 * This is the model class for table "item_category".
 */
class ItemCategory extends BaseItemCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['parent_category'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
