<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

 
            <div class="col-md-6" style="margin-top: 85px;">
            	<div class="ibox-content">
                    <h2 class="font-bold text-center text-success">Forgot password</h2>
                    <p class="text-center text-muted">
                        Please choose your new password:
                    </p>
					<?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'class' => 'm-t']); ?>
                        <div class="form-group">
                           <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                        
                        </div>
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary block full-width m-b']) ?>
                        <p class="text-muted text-center">
                           <small>Do you want to see the dashboard?</small>
                        </p>
                        <?= Html::a('Create an account', ['site/index'], ['class' => 'btn btn-outline btn-success btn-block']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
       
