<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pages_seo_trl".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $lang_id
 * @property string $description
 * @property string $keywords
 * @property string $title
 */
class PagesSeoTrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_seo_trl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'lang_id'], 'required'],
            [['page_id', 'lang_id'], 'integer'],
            [['description', 'keywords'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }



    public function getPage()
    {
        return $this->hasOne(Pages::className(),['id' => 'page_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'lang_id' => 'Lang ID',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'title' => 'Title',
        ];
    }
}
