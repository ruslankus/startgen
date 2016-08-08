<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 08/08/16
 * Time: 17:18
 */

namespace app\components\widgets;


use yii\base\Widget;

class FooterWidget extends Widget
{

    public function run()
    {
        return $this->render('footer');
    }
}