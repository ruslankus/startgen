<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $prefix
 * @property string $locale
 * @property string $name
 * @property integer $active
 * @property integer $default
 * @property string $created_at
 * @property string $updated_at
 */
class Languages extends \yii\db\ActiveRecord
{

    // current language
    static $current = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prefix', 'locale', 'name'], 'required'],
            [['active', 'default'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['prefix'], 'string', 'max' => 2],
            [['locale'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 20],
        ];
    }


    static function getCurrentLanguage()
    {
        if(null === self::$current){
            self::$current = self::getCurrentLanguage();
        }

        return self::$current;
    }


    static function getCurrentLngId()
    {
        return self::getCurrentLanguage()['id'];
    }


    public static function setCurrentLang($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = !empty($language) ? $language->toArray() : self::getDefaultLanguage()->toArray();
        //setting locale
        Yii::$app->language = self::$current['locale'];
        //setting data to session
        Yii::$app->session->set('current_language', self::$current);
    }



    public static function getDefaultLanguage()
    {
        return self::find()->where(['default' => true])->one();
    }


    public static function getLangByUrl($prefix = null)
    {
        if(null === $prefix){
            return null;
        }else {

            $language = self::find()->where(['prefix' => $prefix])->one();
            return !empty($language)? $language : null;
        }
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prefix' => 'Prefix',
            'locale' => 'Locale',
            'name' => 'Name',
            'active' => 'Active',
            'default' => 'Default',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
