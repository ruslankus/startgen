<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $label
 * @property integer $main
 * @property integer $order
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main', 'order'], 'integer'],
            [['label'], 'string', 'max' => 255],
        ];
    }


    public function getSeo()
    {
        return $this->hasMany(PagesSeoTrl::className(), ['page_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);

    }



    public function getBlocks()
    {
        return $this->hasMany(PagesBlocks::className(),['page_id' => 'id'])
            ->with('trl', 'type');
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'main' => 'Main',
            'order' => 'Order',
        ];
    }
}
