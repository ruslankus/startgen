<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $label
 * @property integer $link
 * @property string $link_value
 * @property string $img
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'integer'],
            [['label', 'link_value', 'img'], 'string', 'max' => 255],
        ];
    }


    public function getContent()
    {
        return $this->hasMany(SlidersContent::className(),['slide_id' => 'id'])
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
            'link' => 'Link',
            'link_value' => 'Link Value',
            'img' => 'Img',
        ];
    }
}
