<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppLoginAsset;
use yii\helpers\Url;

use app\models\User;
use app\models\Operateurs;

/* @var $this \yii\web\View */
/* @var $content string */

AppLoginAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
	<?php $this->beginBody() ?>
		<div class="login-box">
			<div class="login-logo">
		       <a href="#"><span class="fa fa-group"></span>FINALYTICS</a>
		    </div><!-- /.login-logo -->
		    <div class="login-box-body">
		        <p class="login-box-msg">BIENVENUE A FINALYTICS ADMINISTRATION</p>
		    	<?= $content ?>
		    	
		    	<?= Html::a('Forgot password?', ['default/request-password-reset']) ?><br/>
		    </div>
		</div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


