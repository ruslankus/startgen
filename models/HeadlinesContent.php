<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "headlines_content".
 *
 * @property integer $id
 * @property integer $headline_id
 * @property integer $lang_id
 * @property string $title
 * @property string $text
 */
class HeadlinesContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'headlines_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['headline_id', 'lang_id'], 'required'],
            [['headline_id', 'lang_id'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'headline_id' => 'Headline ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
