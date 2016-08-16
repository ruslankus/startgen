<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $label
 * @property integer $parent_id
 * @property string $img
 */
class Category extends \yii\db\ActiveRecord
{
    public $upload_image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label'], 'required'],
            [['parent_id'], 'integer'],
            [['label', 'img'], 'string', 'max' => 255],
            [['upload_image'], 'image', 'extensions' => 'jpg']
        ];
    }


    public function getParent()
    {
        return $this->hasOne(Category::className(),['id' => 'parent_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'parent_id' => 'Parent category',
            'img' => 'Img',
            'upload_image' => "Upload Image"
        ];
    }


    public function upload()
    {
        if ($this->validate()) {

            $image_name = uniqid() . "." .$this->upload_image->extension;

            $this->upload_image->saveAs("images/product-category/" . $image_name);

            //checking old file
            if (!empty($this->img)){

                $old_file_path = Yii::getAlias('@webroot').DIRECTORY_SEPARATOR."images/product-category"
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
