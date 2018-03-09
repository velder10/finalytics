<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup 555';
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
			<h3 class="text-center text-success">Create an account</h3>
            <?php $form = ActiveForm::begin([
            		'id' => 'form-signup', 'class' => 'm-t',
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
            	<div class="row">
            		<div class="col-md-6">
            			<?= $form->field($model, 'email', ['labelOptions' => ['class' => 'text-success']])
            				->textInput(['placeholder' => 'e-mail', 'style' => 'color: #888888;']) ?>
            		</div>
            		<div class="col-md-6">
            			<?= $form->field($model, 'telephone', ['labelOptions' => ['class' => 'text-success']])
            			->textInput(['placeholder' => 'telephone', 'style' => 'color: #888888;']) ?>
            		</div>
            	</div>
            	<div class="form-group">
            		<?= $form->field($model, 'terms_conditions')->checkbox()?>
            	</div>
           		<?= Html::submitButton('Signup', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'signup-button']) ?>
            	<p class="text-muted text-center"><small>Already have an account?</small></p>
            	<?= Html::a('Login', ['site/login'], ['class' => 'btn btn-outline btn-success btn-block']) ?>
                
            <?php ActiveForm::end(); ?>
            <p class="m-t text-success"> <small>Finalytics, la banque d'information du nouveau monde  &copy; 2017</small></p>
       </div>
	</div>