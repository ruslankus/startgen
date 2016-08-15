<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pages_blocks_trl".
 *
 * @property integer $id
 * @property integer $block_id
 * @property integer $lang_id
 * @property string $content
 * @property integer $order
 */
class PagesBlocksTrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_blocks_trl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['block_id', 'lang_id'], 'required'],
            [['block_id', 'lang_id', 'order'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_id' => 'Block ID',
            'lang_id' => 'Lang ID',
            'content' => 'Content',
            'order' => 'Order',
        ];
    }
}
