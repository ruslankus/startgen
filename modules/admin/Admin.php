<?php

namespace app\modules\admin;


use yii\filters\AccessControl;
use Yii;

/**
 * admin module definition class
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->language = 'ru_RU';
        // custom initialization code goes here
    }


    //Authorisation behaviars
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'hash'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        //'actions' => ['logout'],
                        'roles' => ['@'],
                    ],

                ],

                //'denyCallback' => function () {
                //    return Yii::$app->response->redirect(['/admin/auth/login']);
                //},
            ],

        ];
    }
}
