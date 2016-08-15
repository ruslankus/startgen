<?php

namespace app\modules\admin\models;

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'img' => 'Title image',
        ];
    }
}
