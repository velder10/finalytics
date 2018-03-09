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
			<?= $content ?>
        	<hr/>
	        <div class="row">
	            <div class="col-md-6">
	                Copyright ASSIST S.A.
	            </div>
	           <div class="col-md-6 text-right">
	               <small><?= Html::a('Demande d\'accreditation', [''], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;
	               <small><?= Html::a('A propos', ['site/index'], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;
	               <small><?= Html::a('Contact', ['site/contact'], ['style' => 'color: #ffffff;']) ?></small>&nbsp;&nbsp;&nbsp;&nbsp;
	               <small>&#9400; 2016-2019</small>
	            </div>
	        </div>
        </div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

