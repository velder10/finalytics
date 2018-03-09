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
			'css/bootstrap.min.css',
			'css/font-awesome.min.css',
			'css/ionicons.min.css',
			'css/AdminLTE.min.css',
			'css/skin-blue.min.css',
			'css/fullcalendar.min.css',
			'css/bootstrap.vertical-tabs.min.css',
			'css/site.css',
	];
	
	public $js = [
			'js/jquery-2.2.3.min.js',
			'js/bootstrap.min.js',
			'js/app.min.js',
			'js/moment.min.js',
			'js/fullcalendar.min.js',
			'js/fr.js',
			'js/highcharts.js',
			'js/data.js',
			'js/drilldown.js',
			'js/no-data-to-display.js',
			'js/exporting.js',
			'js/jquery.flot.min.js',
			'js/jquery.flot.resize.min.js',
			'js/jquery.flot.pie.min.js',
			'js/jquery.flot.categories.min.js',
	];
	
	public $depends = [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
	];
}
