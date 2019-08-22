<?php

use yii\helpers\Html;

?>

<div class="modal-backdrop hidden" id="registrationModal">
    <div>
        <div class="login-menu">
            <div class="login-cancel-btn">X</div>
            <h2 class="login-menu_header">
                <?php echo Html::encode('Registration') ?>
            </h2>
            <?php echo Html::beginForm('/site/signup', 'post', ['class' => 'login-menu_form']) ?>
            <div class="login-menu_form-fields">
                <label class="login-form-input-title">
                    <?php echo Html::encode('First Name') ?>
                    <?php echo Html::textInput('firstName', '', [
                        'class' => 'login-form-input',
                        'placeholder' => 'Your first name...',
                    ]) ?>
                </label>
                <label class="login-form-input-title">
                    <?php echo Html::encode('Last Name') ?>
                    <?php echo Html::textInput('secondName', '', [
                        'class' => 'login-form-input',
                        'placeholder' => 'Your last name...',
                    ]) ?>
                </label>
                <label class="login-form-input-title">
                    <?php echo Html::encode('Email Address') ?>
                    <?php echo Html::input('email', 'email', '', [
                        'class' => 'login-form-input',
                        'placeholder' => 'Your email...',
                    ]) ?>
                </label>
                <label class="login-form-input-title">
                    <?php echo Html::encode('Password') ?>
                    <?php echo Html::passwordInput('password', '', [
                        'class' => 'login-form-input',
                        'placeholder' => 'Your password...',
                    ]) ?>
                </label>
                <label class="login-form-input-title">
                    <?php echo Html::encode('Confirm Password') ?>
                    <?php echo Html::passwordInput('password2', '', [
                        'class' => 'login-form-input',
                        'placeholder' => 'Your confirm password...',
                    ]) ?>
                </label>
            </div>
            <?php echo Html::submitButton('Register', ['class' => 'login-form_btn']) ?>
            <?php echo Html::endForm(); ?>
            <div class="registration-area">
                <div id="logInModalLink" class="login-form_btn register_btn">
                    <?php echo Html::encode('Login Here') ?>
                </div>
            </div>
        </div>
    </div>
</div>
