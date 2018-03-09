<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

/* $script = <<< JS
	$(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
    });
JS;
$this->registerJs($script, \yii\web\View::POS_END); */
?>

            <div class="col-md-6" style="margin-top: 10px;">
                <div class="ibox-content">
                	<h3 class="text-center text-success">Login</h3>
                	<?php $form = ActiveForm::begin([
                			'id' => 'login-form', 'class' => 'm-t',
                			'enableAjaxValidation' => true,
                			'enableClientValidation' => true,
                	]); ?>
                		<div class="form-group">
                			<?= $form->field($model, 'username', ['labelOptions' => ['class' => 'text-success']])
                			->textInput(['placeholder' => 'username', 'style' => 'color: #888888;']) ?>
                		</div>
                		<div class="form-group">
                			<?= $form->field($model, 'password', ['labelOptions' => ['class' => 'text-success']])
                			->passwordInput(['placeholder' => 'password', 'style' => 'color: #888888;']) ?>
                		</div>
                		<div class="form-group">
                			<?= $form->field($model, 'rememberMe')->checkbox() ?>
                		</div>
                		<?= Html::submitButton('Login', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>
                		
                		<?= Html::a('<small>Forgot password?</small>', ['site/request-password-reset'], ['class' => 'text-muted']) ?>
                        <br/>
                		
                		
						        <?php $authAuthChoice = AuthChoice::begin([
									'baseAuthUrl' => ['site/auth']
								]); ?>
								<ul class="container list-inline">
								<?php foreach ($authAuthChoice->getClients() as $client): ?>
								     <li><?= $authAuthChoice->clientLink($client) ?></li>
								<?php endforeach; ?>
								</ul>
								<?php AuthChoice::end(); ?>
                		
                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <?= Html::a('Create an account', ['site/signup'], ['class' => 'btn btn-outline btn-success btn-block']) ?>
                	<?php ActiveForm::end(); ?>
                    <p class="m-t text-success">
                        <small>Finalytics, la banque d'information du nouveau monde  &copy; 2017</small>
                    </p>
                </div>
            </div>