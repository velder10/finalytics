<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppLoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
    	'css/animate.css',
    	'css/font-awesome.css',
    	'css/style.css',
    	//'css/style2.css',
    	'css/custom.css',
    	//'css/nifty.min.css',
    ];
    public $js = [
    	'js/jquery-3.1.1.min.js',
    	'js/bootstrap.min.js',
    	'js/icheck.min.js',
    	'js/inspinia.js',
    	'js/pace.min.js',
    	'js/jquery.slimscroll.min.js',
    	'js/jasny-bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
