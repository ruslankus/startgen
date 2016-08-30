<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $visit_date
 * @property integer $car_id
 * @property string $car_year
 * @property string $engine_power
 * @property string $engine_volume
 * @property string $problem_description
 * @property integer $is_seen
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'car_id'], 'required'],
            [['visit_date', 'created_at', 'updated_at'], 'safe'],
            [['car_id', 'is_seen', 'is_active'], 'integer'],
            [['problem_description'], 'string'],
            [['name', 'phone', 'car_year', 'engine_power', 'engine_volume'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Labels::t('name') ,
            'phone' => Labels::t('phone'),
            'visit_date' => Labels::t('visit_date'),
            'car_id' => Labels::t('car_type'),
            'engine_power' => 'Engine Power',
            'engine_volume' => 'Engine Volume',
            'problem_description' => Labels::t('problem_description'),
            'is_seen' => 'Is Seen',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
