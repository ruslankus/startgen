<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pages_blocks_types".
 *
 * @property integer $id
 * @property string $label
 * @property string $name
 */
class PagesBlocksTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_blocks_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
