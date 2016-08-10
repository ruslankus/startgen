<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $label
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{

     protected static $_settings_map = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'value'], 'string', 'max' => 255],
        ];
    }


    protected static function setMap()
    {
        $array = self::find()->asArray()->all();
        self::$_settings_map = array_column($array,'value','label');

    }


    public static function getMap($label = null)
    {
        if(empty(self::$_settings_map)){
            self::setMap();
        }

        if(empty($label)){
            return self::$_settings_map;
        }else{
            return !empty(self::$_settings_map[$label])? self::$_settings_map[$label] : "!no_{$label} ";
        }

    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'value' => 'Value',
        ];
    }
}
