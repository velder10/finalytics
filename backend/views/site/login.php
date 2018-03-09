<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var auth\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $form = ActiveForm::begin([
		'id' => 'login-form',
	]); ?>
	
	<div class="form-group has-feedback">
	    <?= $form->field($model, 'username') 
			 ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'class' => 'form-control']) ?>
      
    </div>
	
	<div class="form-group has-feedback">
		<?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
	    
	</div>
	
	<div class="row">
		<div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </label>
              </div>                        
            </div><!-- /.col -->
			
		<div class="col-xs-4">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div><!-- /.col -->
	 </div>
<?php ActiveForm::end(); ?>