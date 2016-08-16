<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category_content".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $lang_id
 * @property string $title_seo
 * @property string $title
 * @property string $description_seo
 * @property string $keywords
 * @property string $snippet
 * @property string $text
 */
class CategoryContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'lang_id'], 'required'],
            [['category_id', 'lang_id'], 'integer'],
            [['snippet', 'text'], 'string'],
            [['title_seo', 'title', 'description_seo', 'keywords'], 'string', 'max' => 255],
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'lang_id' => 'Lang ID',
            'title_seo' => 'Title Seo',
            'title' => 'Title',
            'description_seo' => 'Description Seo',
            'keywords' => 'Keywords',
            'snippet' => 'Snippet',
            'text' => 'Text',
        ];
    }
}
