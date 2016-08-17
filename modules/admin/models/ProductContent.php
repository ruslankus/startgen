<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product_content".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $lang_id
 * @property string $product_title
 * @property string $product_description
 * @property string $product_text
 *
 * @property Products $product
 */
class ProductContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'lang_id'], 'required'],
            [['product_id', 'lang_id'], 'integer'],
            [['product_description', 'product_text'], 'string'],
            [['product_title'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'lang_id' => 'Lang ID',
            'product_title' => 'Product Title',
            'product_description' => 'Product Description',
            'product_text' => 'Product Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
