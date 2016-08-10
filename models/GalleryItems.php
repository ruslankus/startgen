<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_items".
 *
 * @property integer $id
 * @property string $body
 * @property integer $gallery_id
 * @property string $picture_file_name
 * @property string $picture_content_type
 * @property integer $picture_file_size
 * @property string $picture_updated_at
 * @property string $created_at
 * @property string $updated_at
 */
class GalleryItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_items';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['gallery_id', 'picture_file_size'], 'integer'],
            [['picture_updated_at', 'created_at', 'updated_at'], 'safe'],
            [['picture_file_name', 'picture_content_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'gallery_id' => 'Gallery ID',
            'picture_file_name' => 'Picture File Name',
            'picture_content_type' => 'Picture Content Type',
            'picture_file_size' => 'Picture File Size',
            'picture_updated_at' => 'Picture Updated At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
