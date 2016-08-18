<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 19/08/16
 * Time: 00:33
 */

namespace app\controllers;


class OrdersController extends AppController
{

    public function actionIndex()
    {
        return $this->renderPartial('partials/_order_form');
    }

}