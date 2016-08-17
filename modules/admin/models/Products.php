<?php

namespace app\modules\admin\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $old_id
 * @property string $name
 * @property string $part_number
 * @property string $catalog_number
 * @property string $text
 * @property string $text2
 * @property integer $category_id
 * @property string $category_name
 * @property string $img
 * @property string $img_type
 *
 * @property ProductContent[] $productContents
 */
class Products extends \yii\db\ActiveRecord
{
    public $upload_image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_id', 'category_id'], 'integer'],
            [['text', 'text2'], 'string'],
            [['name','part_number',"catalog_number" ,'category_name', 'img'], 'string', 'max' => 255],
            [['upload_image'], 'image', 'extensions' => 'jpg,png,bmp']
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
            'part_number' => 'Part Number',
            'catalog_number' => "Catalog Number",
            'text' => 'Text',
            'text2' => 'Text2',
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'img' => 'Img',
            'upload_image' => 'Upload Image'

        ];
    }


    public function getcategory()
    {
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductContents()
    {
        return $this->hasMany(ProductContent::className(), ['product_id' => 'id']);
    }


    public function upload()
    {
        $image_path = '';
        $full_image_path = '';
        if ($this->validate()) {

            $image_name = uniqid() . "." .$this->upload_image->extension;

            if(!empty($this->old_id)){
                $image_path = Yii::getAlias('@webroot'). DC .'images' .DC . 'products'. DC . $this->old_id . DC;
                $full_image_path = $image_path . "original_" . $image_name;
            }else{
                $image_path = Yii::getAlias('@webroot'). DC .'images' .DC . 'products'. DC . 'new' .DC;
                $full_image_path = $image_path . "original_" . $image_name;
            }

            $this->upload_image->saveAs($full_image_path);

            //making thumb
            Image::getImagine()->open($full_image_path)
                ->thumbnail(new Box(160,160))
                ->save($image_path. 'thumb_'.$image_name);


            //checking old file
            if (!empty($this->img)){

                $old_file_path = $image_path . "original_".$this->img;
                $old_file_thumb_path = $image_path . "thumb_".$this->img;

                @unlink($old_file_path);
                @unlink($old_file_thumb_path);
            }

            $this->img = $image_name;

            return true;
        } else {
            return false;
        }
    }
}
