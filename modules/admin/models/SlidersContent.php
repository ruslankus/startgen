<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sliders_content".
 *
 * @property integer $id
 * @property integer $slide_id
 * @property integer $lang_id
 * @property string $title
 * @property string $text
 */
class SlidersContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sliders_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_id', 'lang_id'], 'required'],
            [['slide_id', 'lang_id'], 'integer'],
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
            'slide_id' => 'Slide ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
