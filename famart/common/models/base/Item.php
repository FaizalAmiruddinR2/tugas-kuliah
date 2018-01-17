<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "item".
 *
 * @property integer $id
 * @property string $name
 * @property integer $stock
 * @property string $price
 * @property string $photo
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\ItemCategory $category
 * @property \common\models\User $createdBy
 * @property \common\models\User $updatedBy
 * @property \common\models\OrderItem[] $orderItems
 * @property \common\models\CustomerOrder[] $orders
 */
class Item extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'stock', 'price', 'photo'], 'required'],
            [['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['stock', 'price'], 'integer', 'min' => 0],
            [['name'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'stock' => 'Stock',
            'price' => 'Price',
            'photo' => 'Photo',
            'category_id' => 'Category ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\common\models\ItemCategory::className(), ['id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\common\models\OrderItem::className(), ['item_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\common\models\CustomerOrder::className(), ['id' => 'order_id'])->viaTable('order_item', ['item_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ItemQuery(get_called_class());
    }
}
