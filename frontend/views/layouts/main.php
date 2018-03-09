<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\User;

AppAsset::register($this);

$script = <<< JS
	$(document).ready(function () {
        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();
JS;
$this->registerJs($script, \yii\web\View::POS_END);

if(!Yii::$app->user->isGuest)
{
	$user = User::findOne(Yii::$app->user->identity->id);
}
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
<body id="page-top" class="landing-page">
	<?php $this->beginBody() ?>
		<div class="navbar-wrapper">
		        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		            <div class="container">
		                <div class="navbar-header page-scroll">
		                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
		                     data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <?php if (!Yii::$app->user->isGuest): ?>
		                    	<?= Html::a('FINALYTICS'.' ('.$user->username.')', [''], ['class' => 'navbar-brand']) ?>
		                    <?php else: ?>
		                     	<?= Html::a('FINALYTICS', ['site/index'], ['class' => 'navbar-brand']) ?>
		                    <?php endif; ?>
		                    
		                </div>
		                <div id="navbar" class="navbar-collapse collapse">
		                    <ul class="nav navbar-nav navbar-right">
		                        <li><a class="page-scroll" href="#page-top">Home</a></li>
		                        <li><a class="page-scroll" href="#features">Features</a></li>
		                        <li><a class="page-scroll" href="#team">Team</a></li>
		                        <li><a class="page-scroll" href="#pricing">Pricing</a></li>
		                        <li><a class="page-scroll" href="#contact">Contact</a></li>
		                    </ul>
		                </div>
		            </div>
		        </nav>
		</div>
		<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
		    <ol class="carousel-indicators">
		        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
		        <li data-target="#inSlider" data-slide-to="1"></li>
		    </ol>
		    <div class="carousel-inner" role="listbox">
		        <div class="item active">
		            <div class="container">
		                <div class="carousel-caption">
		                    <h1>We put together<br/>
		                        people, investors,<br/>
		                        and enterprises. We are<br/>
		                        a financial social network</h1>
		                    <p>take information. make your decision better!!!</p>
		                    <p>
		                    	 <?php if (!Yii::$app->user->isGuest): ?>
			                    	<?= Html::a('My Account', [''], ['class' => 'btn btn-md btn-success', 'role' => 'button']) ?>
			                    	<?= Html::a('Logout', ['site/logout'], ['class' => 'btn btn-md btn-warning', 'role' => 'button'], ['data-method' => 'post']) ?>
			                    <?php else: ?>
			                     	<?= Html::a('Register', ['site/signup'], ['class' => 'btn btn-md btn-success', 'role' => 'button']) ?>
		                            <?= Html::a('Login', ['site/login'], ['class' => 'btn btn-md btn-warning', 'role' => 'button']) ?>
			                    <?php endif; ?>
		                    </p>
		                </div>
		                <div class="carousel-image wow zoomIn">
		                    <img src="img/landing/laptop.png" alt="laptop"/>
		                </div>
		            </div>
		            <!-- Set background for slide in css -->
		            <div class="header-back one"></div>
		
		        </div>
		        <div class="item">
		            <div class="container">
		                <div class="carousel-caption blank">
		                    <h1>Use your phone <br/> Get information in real time.</h1>
		                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
		                    <p><a class="btn btn-lg btn-success" href="#features" role="button">Learn more</a></p>
		                </div>
		            </div>
		            <!-- Set background for slide in css -->
		            <div class="header-back two"></div>
		        </div>
		    </div>
		    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
		        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		        <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
		        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
		    </a>
		</div>
	
	    <?= $content ?>
	     
	    <section id="contact" class="gray-section contact">
		    <div class="container">
		        <div class="row m-b-lg">
		            <div class="col-lg-12 text-center">
		                <div class="navy-line"></div>
		                <h1>Contact Us</h1>
		                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
		            </div>
		        </div>
		        <div class="row m-b-lg">
		            <div class="col-lg-3 col-lg-offset-3">
		                <address>
		                    <strong><span class="text-success">ASSIST, S.A.</span></strong><br/>
		                    152 Avenue Magloire Ambroise<br/>
		                    Port-au-Prince, Haiti 6110<br/>
		                    <abbr title="Phone">P:</abbr> (509) 37392636
		                </address>
		            </div>
		            <div class="col-lg-4">
		                <p class="text-color">
		                    Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
		                </p>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-lg-12 text-center">
		                <a href="mailto:test@email.com" class="btn btn-success">Send us mail</a>
		                <p class="m-t-sm">
		                    Or follow us on social platform
		                </p>
		                <ul class="list-inline social-icon">
		                    <li><a href="#"><i class="fa fa-twitter"></i></a>
		                    </li>
		                    <li><a href="#"><i class="fa fa-facebook"></i></a>
		                    </li>
		                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
		                    </li>
		                </ul>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
		                <p><strong>&copy; 2017 ASSIST S.A.</strong></p>
		            </div>
		        </div>
		    </div>
		</section>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
