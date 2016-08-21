<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car_list".
 *
 * @property integer $id
 * @property string $label
 * @property string $name
 */
class CarList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'name'], 'required'],
            [['label', 'name'], 'string', 'max' => 255],
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
            'name' => 'Name',
        ];
    }
}
