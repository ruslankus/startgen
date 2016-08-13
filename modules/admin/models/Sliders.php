<?php

namespace app\modules\admin\models;

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
    public $upload_image;
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
            [['upload_image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
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
            'upload_image' => "Upload Image"
        ];
    }
}
