<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

        
            <div class="col-md-6" style="margin-top: 85px;">
            	<br/>
            	<div class="ibox-content">
                    <h2 class="font-bold text-center text-success">Forgot password</h2>
                    <p class="text-center text-muted">
                        Enter your email address and your password will be reset and emailed to you.
                    </p>
					<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'class' => 'm-t']); ?>
                        <div class="form-group">
                           <?= $form->field($model, 'email')
                           	->textInput(['autofocus' => true, 'placeholder' => 'Please enter your email', 'style' => 'color: #888888;'])
                            ?>
                        </div>
                        <?= Html::submitButton('Send new password', ['class' => 'btn btn-primary block full-width m-b']) ?>
                        <p class="text-muted text-center">
                           <small>Do not have an account?</small>
                        </p>
                        <?= Html::a('Create an account', ['site/signup'], ['class' => 'btn btn-outline btn-success btn-block']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
       