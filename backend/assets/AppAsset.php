<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/_all-skins.min.css',
        'css/AdminLTE.min.css',
        'css/all.css',
        'css/blue.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/morris.css',
        'css/select2.min.css',
        '//https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'fonts/FontAwesome.otf',
        'fonts/fontawesome-webfont.eot',
        'fonts/fontawesome-webfont.svg',
        'fonts/fontawesome-webfont.ttf',
        'fonts/fontawesome-webfont.woff',
        'fonts/fontawesome-webfont.woff2',
        'fonts/ionicons.eot',
        'fonts/ionicons.svg',
        'fonts/ionicons.ttf',
        'fonts/ionicons.woff',
    ];
    public $js = [
        'js/adminlte.min.js',
        'js/bootstrap.min.js',
        'js/dashboard.js',
        'js/fastclick.js',
        'js/html5shiv.min.js',
        'js/jquery.min.js',
        'js/jquery.slimscroll.min.js',
        'js/jquery.sparkline.min.js',
        'js/jquery-ui.min.js',
        'js/moment.min.js',
        'js/morris.min.js',
        'js/raphael.min.js',
        'js/respond.min.js',
        'js/select2.full.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
