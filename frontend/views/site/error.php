<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'main_login1';
?>

<div class="row">
	            <div class="middle-box text-center animated fadeInDown">
        <h2 class="font-bold"><?= Html::encode($this->title) ?></h2>
        <h3 class="font-bold">Page Not Found</h3>

        <div class="error-desc">
        	<div class="alert alert-danger">
		        <?= nl2br(Html::encode($message)) ?>
		    </div>
		    <p>
		        The above error occurred while the Web server was processing your request.
		    </p>
		    <p>
		        Please contact us if you think this is a server error. Thank you.
		    </p>
		    
		     <?php if (!Yii::$app->user->isGuest): ?>
			     <?= Html::a('Go to Dashboard', [''], ['class' => 'btn btn-warning']) ?>
			 <?php else: ?>
			     <?= Html::a('Go to Home', ['site/index'], ['class' => 'btn btn-warning']) ?>
			 <?php endif; ?>
		    
            <form class="form-inline m-t" role="form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for page">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
	            
			</div>
