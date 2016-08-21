<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "messages_content".
 *
 * @property integer $id
 * @property integer $message_id
 * @property integer $lang_id
 * @property string $content
 */
class MessagesContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'lang_id'], 'required'],
            [['message_id', 'lang_id'], 'integer'],
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
            'message_id' => 'Message ID',
            'lang_id' => 'Lang ID',
            'content' => 'Content',
        ];
    }
}
