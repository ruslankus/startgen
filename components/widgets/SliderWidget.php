<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 07/08/16
 * Time: 15:52
 */

namespace app\components\widgets;


use yii\base\Widget;

class SliderWidget extends Widget
{
    public function run()
    {
        return $this->render('slider');
    }
}