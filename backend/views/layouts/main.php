<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use yii\helpers\Url;
use common\models\User;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

if(!Yii::$app->user->isGuest)
{
	$user = User::findOne(Yii::$app->user->identity->id);
}
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
<body class="skin-blue sidebar-mini fixed">
	<?php $this->beginBody() ?>
	    <div class="wrapper">
	    	<header class="main-header">
			  <?= Html::a('<span class="fa fa-group">FINALYTICS</span></i>', 
			      ['site/index'], ['class' => 'logo']);?>
			  <!-- Header Navbar: style can be found in header.less -->
			  <nav class="navbar navbar-static-top" role="navigation">
			    <!-- Navbar Right Menu -->
			    <a class="sidebar-toggle" role="button" data-toggle="offcanvas" href="#">
					<span class="sr-only">
						Toggle navigation
					</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			    <div class="navbar-custom-menu">
			      <ul class="nav navbar-nav">
			        <!-- Messages: style can be found in dropdown.less-->
			        
			        <?php if (Yii::$app->user->isGuest): ?>
			        	<li class="dropdown user user-menu">
					    	<?= Html::a('<i class="fa fa-sign-in"></i><span class="hidden-xs">Se Connecter</span></i>', ['auth/default/login']);?>
			        	</li>
			        <?php elseif (!Yii::$app->user->isGuest): ?>
			            <li class="dropdown messages-menu">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
				           role="button" aria-expanded="false"><i class="fa fa-gears"></i> <span class="caret"></span></a>
				           
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#"><i class="fa fa-bars"></i>Profil</a></li>
	            			<li><a href="#"><i class="fa fa-gears"></i>Parametres</a></li>
				          </ul>
				        </li>
			            <!-- User Account: style can be found in dropdown.less -->
				        <li class="dropdown user user-menu">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				          	 <img src="img/avatar3.png" class="user-image" alt="User Image"/>
				             <span class="hidden-xs"><?php echo $user->username ?> </span>
				          </a>
				          <ul class="dropdown-menu">
				            <!-- User image -->
				            <li class="user-header">
				              <?php if (1): ?>
					          		<img src="img/avatar5.png" class="img-circle" alt="User Image"/>
					           <?php endif; ?>
					           <?php if (0): ?>
					          		<img src="img/avatar3.png" class="img-circle" alt="User Image"/>
					           <?php endif; ?>
				             
				              <p>
				                <?php echo $user->username ?>
				                <small>utilisateur</small>
				              </p>
				            </li>
				            <!-- Menu Body -->
				            <?php if (1): ?>
					            <li class="user-body">
					              <div class="col-xs-4 text-center">
					              	<?= Html::a('AKF', ['socialworker/index']);?>
					              </div>
					              <div class="col-xs-4 text-center">
					                <?= Html::a('Plans', ['plans/index']);?>
					              </div>
					              <div class="col-xs-4 text-center">
					                <?= Html::a('Suivis', ['socialworker/suiviakf']);?>
					              </div>
					            </li>
				             <?php endif; ?>
				             <?php if (0): ?>
					            <li class="user-body">
					              <div class="col-xs-6 text-center">
					                <?= Html::a('Rapport', ['rapport/index']);?>
					              </div>
					              <div class="col-xs-6 text-center">
					              	<?= Html::a('Suivis', ['socialworker/massive']);?>
					              </div>
					            </li>
				             <?php endif; ?>
				            <!-- Menu Footer-->
				            <li class="user-footer">
				              <div class="pull-left">
				                <a href="#" class="btn btn-default btn-flat">Profile</a>
				              </div>
				              <div class="pull-right">
				                <?= Html::a('Se Deconnecter', ['/site/logout'],['class' => 'btn btn-default btn-flat'], ['data-method' => 'post']);?> 	
				              </div>
				            </li>
				          </ul>
				        </li>  	
			        <?php endif; ?>
			        
			      </ul>
			    </div>
			  </nav>
			</header>
	    
	        <aside class="main-sidebar">
	        	<section class="sidebar">
	        	   <?php if (!Yii::$app->user->isGuest): ?>
		        		<div class="user-panel">
		        			<div class="pull-left image">
		        			  <?php if (1): ?>
					          		<img src="img/avatar5.png" class="img-circle" alt="User Image"/>
					           <?php endif; ?>
					           <?php if (0): ?>
					          		<img src="img/avatar3.png" class="img-circle" alt="User Image"/>
					           <?php endif; ?>
				              
				            </div>
				            <div class="pull-left info">
				              	<p><?= $user->username ?></p>
								<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				            </div>
		        		</div>
	        		<?php endif; ?>
	        		<ul class="sidebar-menu">
	        			<li class="header">MAIN NAVIGATION</li>
	        			
	        		</ul>
	        	</section>
	        </aside>
	        
	        <div class="content-wrapper">
	        	<?= $content ?>
	        </div>
	        
	        <footer class="main-footer">
	        	<div class="container">
				    <div class="row">
				      <div class="col-sm-12">
				        <p class="pull-left">&copy; FINALYTICS <?= date('Y') ?></p>
				        <p class="pull-right"><?= Yii::$app->name ?></p>
				      </div> <!-- /.col -->
				    </div> <!-- /.row -->
				</div>
	        </footer>
	    </div>
	 
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


