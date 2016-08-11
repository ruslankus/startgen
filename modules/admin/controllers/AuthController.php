<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 11/08/16
 * Time: 14:46
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\LoginForm;
use Yii;

class AuthController extends AppController
{
    public function init()
    {
        parent::init();
        $this->layout = 'login';
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/admin']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        }

        return $this->render('login', compact('model'));
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }




    public function actionHash()
    {
        return Yii::$app->getSecurity()->generatePasswordHash('1234');
    }
}