<?php

use frontend\models\ChangePasswordForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $changePasswordModel ChangePasswordForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['change-password', 'id' => $model->id],
    'options' => [
        'class' => 'section-profile-content-item',
        'data-target' => 'change-password',
    ]
]); ?>

<?php echo $form
    ->field($changePasswordModel, 'password')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Your current password...',
    ])
    ->label('Current Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($changePasswordModel, 'new_password')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Your new password...',
    ])
    ->label('New Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($changePasswordModel, 'confirm_new_password')
    ->passwordInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Confirm new password...',
    ])
    ->label('Confirm New Password', [
        'class' => 'section-profile-content-label',
    ]) ?>

<div class="form-group">
    <?php echo Html::submitButton('Save password', ['class' => 'section-profile-content-btn']) ?>
</div>

<?php ActiveForm::end(); ?>
