<?php

use yii\helpers\Html;

?>

<div class="modal-backdrop hidden" id="loginModal">
    <div>
        <div class="login-menu">
            <div class="login-cancel-btn">X</div>
            <h2 class="login-menu_header">
                <?php echo Html::encode('Log in') ?>
            </h2>
            <p class="login-menu_par">
                <?php echo Html::encode('Please enter your account details') ?>
            </p>
            <?php echo Html::beginForm('/site/login', 'post', ['class' => 'login-menu_form']) ?>
            <div class="field-wrapper">
                <label class="login-form-input-title">
                    <?php echo Html::encode('E-mail') ?>
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
            </div>
            <?php echo Html::submitButton('Log In', ['class' => 'login-form_btn']) ?>
            <?php echo Html::endForm(); ?>
            <div class="registration-area">
                <div id="registerBtnLink" class="login-form_btn register_btn">
                    <?php echo Html::encode('Register Here') ?>
                </div>
            </div>
        </div>
    </div>
</div>
