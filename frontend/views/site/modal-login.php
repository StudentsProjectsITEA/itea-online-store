<?php

use frontend\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $form ActiveForm */
/* @var $model LoginForm */

?>

<h2 class="login-menu_header">
    <?php echo Html::encode('Log in') ?>
</h2>
<?php $form = ActiveForm::begin([
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
        ->field($model, 'password')
        ->passwordInput([
            'class' => 'login-form-input',
            'placeholder' => 'Your password...',
        ])
        ->label('Password', [
            'class' => 'login-form-input-title',
        ]) ?>

</div>

<?php echo Html::submitButton('Log in', ['class' => 'login-form_btn']) ?>

<?php ActiveForm::end(); ?>
