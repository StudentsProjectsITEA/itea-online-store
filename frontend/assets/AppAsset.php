<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/index.css',
        'css/style.css',
        'https://use.fontawesome.com/releases/v5.7.1/css/all.css',
        'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css',
        '//https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i',
    ];
    public $js = [
        'js/index.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
