<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property string $label
 */
class Messages extends \yii\db\ActiveRecord
{

    private static $_map_messages = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
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





    private static function setMap()
    {
        $message_array =  self::find()->with('trl')
            ->asArray()
            ->all();
        foreach ($message_array as $label){

            $trl = array_shift($label['trl']);

            self::$_map_messages[$label['label']] = !empty($trl['content'])? $trl['content'] : "";
        }

    }


    /**
     * @param $label message-label for tranlating
     * @return string result  translation
     */
    public static function t($label)
    {
        if(empty(self::$_map_messages)){
            self::setMap();
        }

        return !empty(self::$_map_messages[$label])? self::$_map_messages[$label] : "!_{$label}";
    }


    public function getTrl()
    {
        return $this->hasMany(MessagesContent::className(), ['message_id' => 'id'])
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
        ];
    }
}
