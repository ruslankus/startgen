<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $label
 * @property integer $parent_id
 * @property string $img
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['label', 'img'], 'string', 'max' => 255],
        ];
    }

    public function getParent()
    {
        return $this->hasMany(Category::className(),['parent_id' => 'id'])
            ->with('content');
    }


    public function getContent()
    {
        return $this->hasMany(CategoryContent::className(),['category_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'parent_id' => 'Parent ID',
            'img' => 'Img',
        ];
    }
}
