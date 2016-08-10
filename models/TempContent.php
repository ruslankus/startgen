<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_content".
 *
 * @property integer $id
 * @property integer $old_id
 * @property string $name
 * @property string $text
 * @property string $text2
 * @property integer $category_id
 * @property string $category_name
 * @property integer $gallery_id
 * @property string $img
 * @property string $img_type
 */
class TempContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_content';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_id', 'category_id', 'gallery_id'], 'integer'],
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
            'gallery_id' => 'Gallery ID',
            'img' => 'Img',
            'img_type' => 'Img Type',
        ];
    }
}
