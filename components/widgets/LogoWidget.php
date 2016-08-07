<?php

namespace app\components\widgets;

use app\models\Languages;
use yii\base\Widget;

class LogoWidget extends Widget
{
    public function run()
    {
        $lng = Languages::getCurrentLanguage()['prefix'];
        return $this->render('logo',compact('lng'));
    }
}