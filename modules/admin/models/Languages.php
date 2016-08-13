<?php

namespace app\modules\admin\models;

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
