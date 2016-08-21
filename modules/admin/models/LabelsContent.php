<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "labels_content".
 *
 * @property integer $id
 * @property integer $label_id
 * @property integer $lang_id
 * @property string $content
 */
class LabelsContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labels_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label_id', 'lang_id'], 'required'],
            [['label_id', 'lang_id'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }



    public function getContent()
    {
        return $this->hasOne(LabelsContent::className(),['label_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label_id' => 'Label ID',
            'lang_id' => 'Lang ID',
            'content' => 'Content',
        ];
    }
}
