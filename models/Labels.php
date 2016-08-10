<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "labels".
 *
 * @property integer $id
 * @property string $label
 */
class Labels extends \yii\db\ActiveRecord
{

    private static $_map_labels = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labels';
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
        $labels_array =  self::find()->with('trl')
            ->asArray()
            ->all();
        foreach ($labels_array as $label){

            $trl = array_shift($label['trl']);

            self::$_map_labels[$label['label']] = !empty($trl['content'])? $trl['content'] : "";
        }

    }


    /**
     * @param $label label for tranlating
     * @return string result  translation
     */
    public static function t($label)
    {
        if(empty(self::$_map_labels)){
            self::setMap();
        }

        return !empty(self::$_map_labels[$label])? self::$_map_labels[$label] : "!_{$label}";
    }


    public function getTrl()
    {
        return $this->hasMany(LabelsContent::className(), ['label_id' => 'id'])
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
