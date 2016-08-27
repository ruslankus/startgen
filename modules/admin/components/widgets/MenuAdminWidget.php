<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 27/07/16
 * Time: 10:19
 */

namespace app\modules\admin\components\widgets;


use yii\base\Widget;

class MenuAdminWidget extends Widget
{
    public $current;

    public function run()
    {

        return $this->render('admin_menu', ['current' => $this->current]);

    }
}