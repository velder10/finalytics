<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppLoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
	    'css/bootstrap.min.css',
	    'css/font-awesome.min.css',
	    'css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/blue.css',
    ];
    
    public $js = [
	    'js/jQuery-2.2.3.min.js',
	    'js/bootstrap.min.js',
        'js/icheck.min.js',
    ];
    
    public $depends = [
        //'yii\web\YiiAsset',
       	//'yii\bootstrap\BootstrapAsset',
    ];
}

