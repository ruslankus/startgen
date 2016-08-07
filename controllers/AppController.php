<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 06/08/16
 * Time: 22:14
 */

namespace app\controllers;


use yii\web\Controller;

abstract class AppController extends Controller
{

    protected $_current_lang;

    public function init()
    {
        $this->_current_lang = \Yii::$app->session->get('current_language');
    }


    protected function setMeta($title=null, $meta=null, $description=null)
    {
        $this->view->title = $title;

        $this->view->registerMetaTag(['name'=> 'keywords', 'content' => $meta]);

        $this->view->registerMetaTag(['name'=> 'description', 'content' => $description]);
    }


}