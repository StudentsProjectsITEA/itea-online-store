<?php

use frontend\models\SignupForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $form ActiveForm */
/* @var $model SignupForm */

?>

<h2 class="login-menu_header">
    <?php echo Html::encode('Registration') ?>
</h2>
<?php $form = ActiveForm::begin([
    'action' => '/site/registration',
    'options' => [
        'class' => 'login-menu_form',
    ]
]); ?>

<div class="login-menu_form-fields">

    <?php echo $form
        ->field($model, 'username')
        ->textInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your username...',
            'value' => $model->username,
        ])
        ->label('Username', [
            'class' => 'login-form-input-title',
        ]) ?>

    <?php echo $form
        ->field($model, 'first_name')
        ->textInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your first name...',
            'value' => $model->first_name,
        ])
        ->label('First name', [
            'class' => 'login-form-input-title',
        ]) ?>

    <?php echo $form
        ->field($model, 'last_name')
        ->textInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your last name...',
            'value' => $model->last_name,
        ])
        ->label('Last name', [
            'class' => 'login-form-input-title',
        ]) ?>

    <?php echo $form
        ->field($model, 'email')
        ->input('email', [
            'class' => 'login-form-input',
            'placeholder' => 'Your email...',
            'value' => $model->email,
        ])
        ->label('Email address', [
            'class' => 'login-form-input-title',
        ]) ?>

    <?php echo $form
        ->field($model, 'password')
        ->passwordInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your password...',
        ])
        ->label('Password', [
            'class' => 'login-form-input-title',
        ]) ?>

    <?php echo $form
        ->field($model, 'confirm_password')
        ->passwordInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your confirm password...',
        ])
        ->label('Confirm Password', [
            'class' => 'login-form-input-title',
        ]) ?>

</div>

<?php echo Html::submitButton('Register', ['class' => 'login-form_btn']) ?>

<?php ActiveForm::end(); ?>
