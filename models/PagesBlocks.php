<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages_blocks".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $type
 * @property string $block_value
 * @property string $block_template
 * @property string $label
 * @property integer $order
 */
class PagesBlocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'type'], 'required'],
            [['page_id', 'type', 'order'], 'integer'],
            [['block_value', 'block_template', 'label'], 'string', 'max' => 255],
        ];
    }


    public function getType()
    {
        return $this->hasOne(PagesBlocksTypes::className(),['id' => 'type']);
    }


    public function getTrl()
    {
        return $this->hasMany(PagesBlocksTrl::className(),['block_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'type' => 'Type',
            'block_value' => 'Block Value',
            'block_template' => 'Block Template',
            'label' => 'Label',
            'order' => 'Order',
        ];
    }
}
