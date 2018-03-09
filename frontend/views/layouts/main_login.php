<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use frontend\assets\AppLoginAsset;

AppLoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="blue-bg" style='background-image: url(img/landing/avatar_all.png);'>
	<?php $this->beginBody() ?>
		<div class="loginColumns animated fadeInDown">
			<div class="row">
				<div class="middle-box col-md-6">
	                <div><h4 class="container-fluid logo-name"><i class="fa fa-bar-chart-o"></i></h4></div>
		            <h3>Welcome to FINALYTICS</h3>
		            <p>Perfectly designed and precisely prepared for whoever financial specialist, 
		                you will get all information about financial's world.</p>
		            <p>Login in. To see it in action.</p>
		            
		            <div class="container btn-group">
		            	 <?= Html::a('Go to Home', ['site/index'], ['class' => 'btn btn-primary']) ?>
		            	 <?= Html::a('Dashboard', [''], ['class' => 'btn btn-warning']) ?>
				    </div>
	            </div>
	            <?= $content ?>
			</div>
        	<hr/>
	        <div class="row">
	            <div class="col-md-6">
	                Copyright ASSIST S.A.
	            </div>
	            <div class="col-md-6 text-right">
	               <small><?= Html::a('Demande d\'accreditation', [''], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;
	               <small><?= Html::a('A propos', ['site/index#features'], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;
	               <small><?= Html::a('Contact', ['site/contact'], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;&nbsp;&nbsp;
	               <small>&#9400; 2016-2019</small>
	            </div>
	        </div>
        </div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

