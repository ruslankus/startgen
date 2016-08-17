<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $old_id
 * @property string $name
 * @property string $text
 * @property string $text2
 * @property integer $category_id
 * @property string $category_name
 * @property string $img
 * @property string $img_type
 *
 * @property ProductContent[] $productContents
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_id', 'category_id'], 'integer'],
            [['text', 'text2'], 'string'],
            [['name', 'category_name', 'img', 'img_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'old_id' => 'Old ID',
            'name' => 'Name',
            'text' => 'Text',
            'text2' => 'Text2',
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'img' => 'Img',
            'img_type' => 'Img Type',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasMany(ProductContent::className(), ['product_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOneContent()
    {
        return $this->hasOne(ProductContent::className(), ['product_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);
    }
}
