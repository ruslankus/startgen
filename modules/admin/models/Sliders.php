<?php

namespace app\modules\admin\models;


use yii\web\UploadedFile;
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
            [['label'], 'required' ],
            [['active'], 'safe'],
            [['label', 'link_value', 'img'], 'string', 'max' => 255],
            [['upload_image'], 'image', 'extensions' => 'jpg', 'maxWidth' => 2200, 'minWidth' => 2000,
                'maxHeight' => 810, 'minHeight' => 795
            ]
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
            'active' => 'Active',
            'link' => 'Link',
            'link_value' => 'Link Value',
            'img' => 'Img',
            'upload_image' => "Upload Image"
        ];
    }


    public function getContent()
    {
        return $this->hasMany(SlidersContent::className(),['slide_id' => 'id']);
    }


    public function upload()
    {
        if ($this->validate()) {

            $image_name = uniqid() . "." .$this->upload_image->extension;

            $this->upload_image->saveAs("images/sliders/" . $image_name);

            //checking old file
            if (!empty($this->img)){

                $old_file_path = Yii::getAlias('@webroot').DIRECTORY_SEPARATOR."images/sliders"
                    .DIRECTORY_SEPARATOR . $this->img;

                @unlink($old_file_path);
            }

            $this->img = $image_name;

            return true;
        } else {
            return false;
        }
    }


    public function deleteImage()
    {
        //checking old file
        if (!empty($this->img)){

            $old_file_path = Yii::getAlias('@webroot').DIRECTORY_SEPARATOR."images/sliders"
                .DIRECTORY_SEPARATOR . $this->img;

            @unlink($old_file_path);
        }
    }
}
