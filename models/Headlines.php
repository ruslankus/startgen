<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "headlines".
 *
 * @property integer $id
 * @property string $label
 * @property string $img
 */
class Headlines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'headlines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'img'], 'string', 'max' => 255],
        ];
    }


    public function getContent()
    {
        return $this->hasMany(HeadlinesContent::className(), ['headline_id' => 'id'])
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
            'img' => 'Img',
        ];
    }
}
