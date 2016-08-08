<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages_seo_trl".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $lang_id
 * @property string $description
 * @property string $keywords
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
        ];
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
        ];
    }
}
