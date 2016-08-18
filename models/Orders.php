<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $order_date
 * @property integer $car
 * @property string $problem_description
 * @property string $created_at
 * @property string $updated_at
 */
class Orders extends ActiveRecord
{


    public function behaviors()
    {
        return [



            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }//behaviors


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
            [['name', 'phone', 'car'], 'required'],
            [['order_date', 'created_at', 'updated_at'], 'safe'],
            [['car'], 'integer'],
            [['problem_description'], 'string'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
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
            'car' => 'Car',
            'problem_description' => 'Problem Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
