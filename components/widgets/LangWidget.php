<?php

namespace app\components\widgets;


use app\models\Languages;
use yii\base\Widget;

class LangWidget extends Widget
{
    public function run()
    {
        $current_lang_array = Languages::getCurrentLanguage();
        $langs_array = Languages::find()->asArray()->all();

        return $this->render('lang', compact('current_lang_array', 'langs_array'));
    }
}