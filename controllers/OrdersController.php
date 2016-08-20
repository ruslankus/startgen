<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 19/08/16
 * Time: 00:33
 */

namespace app\controllers;


use app\models\Orders;

class OrdersController extends AppController
{

    public function actionIndex()
    {
        $order_model = new Orders();

        return $this->renderPartial('partials/_order_form', compact('order_model') );
    }



    public function actionMakeOrder()
    {
        return "ORDER Controller make-order";
    }

}