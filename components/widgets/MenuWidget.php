<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 07/08/16
 * Time: 15:47
 */

namespace app\components\widgets;


use yii\base\Widget;

class MenuWidget extends Widget
{
    public function run()
    {
        return $this->render('top_menu');
    }
}