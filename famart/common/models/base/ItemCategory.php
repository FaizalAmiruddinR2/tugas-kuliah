<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "item_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_category
 *
 * @property \common\models\Item[] $items
 * @property \common\models\ItemCategory $parentCategory
 * @property \common\models\ItemCategory[] $itemCategories
 */
class ItemCategory extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_category'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_category' => 'Parent Category',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\common\models\Item::className(), ['category_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(\common\models\ItemCategory::className(), ['id' => 'parent_category']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategories()
    {
        return $this->hasMany(\common\models\ItemCategory::className(), ['parent_category' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\ItemCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ItemCategoryQuery(get_called_class());
    }
}
