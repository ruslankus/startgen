<?php

namespace app\assets;


use yii\web\AssetBundle;

class FrontAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/bootstrap.min.css',
        'css/lightbox.css',
        'css/style.css'
    ];
    public $js = [
        'js/lightbox.js',
        'js/common.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}