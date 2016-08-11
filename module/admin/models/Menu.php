<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $label
 * @property integer $content_type
 * @property integer $content_id
 * @property string $content_value
 * @property integer $order
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_type'], 'required'],
            [['content_type', 'content_id', 'order'], 'integer'],
            [['label', 'content_value'], 'string', 'max' => 255],
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
            'content_type' => 'Content Type',
            'content_id' => 'Content ID',
            'content_value' => 'Content Value',
            'order' => 'Order',
        ];
    }
}
