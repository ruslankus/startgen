<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_content_type".
 *
 * @property integer $id
 * @property string $label
 */
class MenuContentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_content_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label'], 'string', 'max' => 255],
        ];
    }


    public function getMenu()
    {
        return $this->hasMany(Menu::className(), ['content_type' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
        ];
    }
}
