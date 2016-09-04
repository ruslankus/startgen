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
            [['name', 'phone', 'car_id', 'car_year','engine_power', 'visit_date' ], 'required'],
            [[ 'created_at', 'updated_at'], 'safe'],
           
            [['car_id', 'is_seen', 'is_active', 'car_year','engine_power', 'engine_volume'], 'integer'],
            [['car_year'], 'integer', 'min' => 1980 , 'max' => (int)date('Y')],
            [['problem_description'], 'string'],
            [['name', 'phone', ], 'string', 'max' => 255],
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
            'car_year' => Labels::t('car_year'),
            'engine_power' => Labels::t('engine_power'),
            'engine_volume' => Labels::t('engine_volume'),
            'problem_description' => Labels::t('problem_description'),
            'is_seen' => 'Is Seen',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
