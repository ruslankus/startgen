<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'page/index',

    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
            'layout' => 'admin',
            'defaultRoute' => 'menu/index',
        ],
    ],

    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qDIJr2rfKmmBC6LWo9mdWxL-FBrnGXEv',
            'class' => 'app\components\routers\LangRequest'
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
            'loginUrl' =>'/admin/auth/login'
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'db2' => require(__DIR__ . '/db2.php'),

        'urlManager' => [
            //'class' => 'app\components\routers\LangUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [

                "/" => "/",
                '<language:\w{2}>'=>'/',
                '<language:\w{2}\/>'=>'/',


                '<language:\w{2}>/page'=>'page/index',
                '<language:\w{2}>/<controller:(page)\/>'=>'page/index',
                '<language:\w{2}>/page/<id:\d+>'=>'page/view',
                '<language:\w{2}>/page/<action:\w+>'=>'page/<action>',
                '<language:\w{2}>/page/<action:\w+>/<id:\d+>'=>'page/<action>',


                '<language:\w{2}>/catalog'=>'catalog/index',
                '<language:\w{2}>/<controller:(catalog)\/>'=>'catalog/index',
                '<language:\w{2}>/catalog/<id:\d+>'=>'catalog/category',
                '<language:\w{2}>/catalog/<action:\w+>'=>'catalog/<action>',

                '<language:\w{2}>/catalog/<action:\w+>/<id:\d+>'=>'catalog/<action>',

                '<language:\w{2}>/<controller:[\w-]+>/<action:\w+>'=>'<controller>/<action>',
                '<language:\w{2}>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

                "data" => "data/index",
                "<controller:(data)\/>" => "data/index",

                'admin/<action:(login|logout)>' => 'admin/auth/<action>',

                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',


                'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
                'admin/<controller:\w+>/<action:\w+>/<id:\w+>'=>'admin/<controller>/<action>',

                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                'gii/<controller:\w+>/<action:\w+>/<id:\w+>'=>'gii/<controller>/<action>',


            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
