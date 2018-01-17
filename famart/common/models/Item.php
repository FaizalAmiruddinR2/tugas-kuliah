<?php

namespace common\models;

use Yii;
use \common\models\base\Item as BaseItem;

/**
 * This is the model class for table "item".
 */
class Item extends BaseItem
{
    public $upload_photo;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_UPLOAD = 'upload';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['name', 'stock', 'price', 'upload_photo', 'category_id'];
        $scenarios[self::SCENARIO_UPDATE] = ['name', 'stock', 'price', 'category_id'];
        $scenarios[self::SCENARIO_UPLOAD] = ['upload_photo'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'stock', 'price', 'photo'], 'required'],
            [['upload_photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['stock', 'price'], 'integer', 'min' => 0],
            [['name', 'photo'], 'string', 'max' => 255],
        ]);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if($this->scenario == $this::SCENARIO_CREATE || $this->scenario == $this::SCENARIO_UPLOAD) {
            if ($this->validate()) {
                $name = str_replace(' ', '_', $this->name).'_'.date('Y_m_d_H_i_s') . '.' . $this->upload_photo->extension;
                $this->upload_photo->saveAs('uploads/' . $name);
                
                $this->photo = $name;
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
	
}
