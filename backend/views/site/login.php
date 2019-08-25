<?php

/* @var yii\web\View $this */
/* @var ActiveForm $form */
/* @var LoginForm $model */

use backend\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login | Admin Store | ITEA';
?>
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Online</b>Store</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username', ['inputOptions' => ['class' => 'form-control']])->textInput(['autofocus' => true]) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control']])->passwordInput() ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in
                using
                Google+</a>
        </div>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
