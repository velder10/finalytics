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
        'css/bootstrap.css',
    	'css/animate.css',
    	'css/font-awesome.css',
    	'css/style.css',
    ];
    public $js = [
    	'js/jquery-3.1.1.min.js',
    	'js/bootstrap.min.js',
    	'js/jquery.metisMenu.js',
    	'js/jquery.slimscroll.min.js',
    	'js/inspinia.js',
    	'js/pace.min.js',
    	'js/wow.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
