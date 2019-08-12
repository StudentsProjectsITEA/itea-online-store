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
        'css/bootstrap3-wysihtml5.min.css',
        'css/bootstrap-colorpicker.min.css',
        'css/bootstrap-datepicker.min.css',
        'css/bootstrap-timepicker.min.css',
        'css/dataTables.bootstrap.min.css',
        'css/daterangepicker.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/jquery-jvectormap.css',
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
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/bootstrap-colorpicker.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/bootstrap-timepicker.min.js',
        'js/dashboard.js',
        'js/dataTables.bootstrap.min.js',
        'js/daterangepicker.js',
        'js/demo.js',
        'js/fastclick.js',
        'js/html5shiv.min.js',
        'js/icheck.min.js',
        'js/jquery.dataTables.min.js',
        'js/jquery.inputmask.date.extensions.js',
        'js/jquery.inputmask.extensions.js',
        'js/jquery.inputmask.js',
        'js/jquery.knob.min.js',
        'js/jquery.min.js',
        'js/jquery.slimscroll.min.js',
        'js/jquery.sparkline.min.js',
        'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
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
