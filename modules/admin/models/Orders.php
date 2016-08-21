<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $visit_date
 * @property integer $car
 * @property string $problem_description
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
            [['car_id'], 'integer'],
            [['is_seen', 'is_active'], 'safe'],
            [['problem_description'], 'string'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }



    public function getCar()
    {
        return $this->hasOne(CarList::className(),['id' => 'car_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'visit_date' => 'Visit Date',
            'car_id' => 'Car Name',
            'problem_description' => 'Problem Description',
            'is_seen' => 'Orders is seen',
            'is_active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function seenChange()
    {
        if(!$this->is_seen){

            $this->is_seen = true;
            $this->save();
        }

        return true;
    }
}
