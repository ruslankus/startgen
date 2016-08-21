<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 19/08/16
 * Time: 00:33
 */

namespace app\controllers;


use app\models\Orders;
use Yii;
use yii\helpers\FormatConverter;

class OrdersController extends AppController
{

    public function actionIndex()
    {
        $order_model = new Orders();

        return $this->renderPartial('partials/_order_form', compact('order_model') );
    }



    public function actionMakeOrder()
    {
        if(Yii::$app->request->isAjax){

            $order_model = new Orders();

            $post_data = Yii::$app->request->post();

            if ($order_model->load($post_data)) {

                $order_model->visit_date = date( 'Y-m-d H:i:s', strtotime($order_model->visit_date));

                if($order_model->save()){
                    return $this->renderPartial('partials/_order_form_success');
                }

                return $this->renderPartial('partials/_order_form', compact('order_model'));

            } else {
                return $this->renderPartial('partials/_order_form', compact('order_model'));
            }


        }

        return $this->redirect(['/']);
    }

}