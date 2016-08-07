<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 06/08/16
 * Time: 22:15
 */

namespace app\controllers;


use app\models\Languages;

class PageController extends AppController
{

    public function actionIndex()
    {
        return  $this->render('index');
    }



    public function actionView()
    {
        return Languages::getCurrentLanguage()['prefix'] . "  PAGE/VIEW";
    }


}