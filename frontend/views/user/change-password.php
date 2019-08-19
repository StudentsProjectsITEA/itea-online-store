<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'section-profile-content-item',
        'data-target' => 'change-password',
    ]
]); ?>

<?php echo $form
    ->field($model, 'password_hash')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Your current password...',
        'value' => '',
    ])
    ->label('Current Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($model, 'password_hash')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Your new password...',
        'value' => '',
    ])
    ->label('New Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($model, 'password_hash')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Confirm new password...',
        'value' => '',
    ])
    ->label('Confirm New Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<div class="form-group">
    <?php echo Html::submitButton('Save password', ['class' => 'section-profile-content-btn']) ?>
</div>

<?php ActiveForm::end(); ?>
