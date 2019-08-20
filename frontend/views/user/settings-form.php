<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
?>

<?php $form = ActiveForm::begin([
    'action' => ['update', 'id' => $model->id],
    'options' => [
        'id' => 'formPersonalInfo',
        'class' => 'section-profile-content-item',
        'data-target' => 'personal-info',
    ]
]); ?>

<?php echo $form
    ->field($model, 'first_name')
    ->textInput([
        'class' => 'section-profile-content-input',
        'placeholder' => 'Your first name...',
        'value' => $model->first_name,
    ])
    ->label('First name', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($model, 'last_name')
    ->textInput([
        'class' => 'section-profile-content-input',
        'type' => 'text',
        'placeholder' => 'Your last name...',
        'value' => $model->last_name,
    ])
    ->label('Last name', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($model, 'mobile')
    ->textInput([
        'class' => 'section-profile-content-input',
        'type' => 'text',
        'placeholder' => 'Your mobile number...',
        'value' => $model->mobile,
    ])
    ->label('Mobile number', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php echo $form
    ->field($model, 'email')
    ->textInput([
        'class' => 'section-profile-content-input',
        'type' => 'email',
        'placeholder' => 'Your email...',
        'value' => $model->email,
    ])
    ->label('Email address', [
        'class' => 'section-profile-content-label',
    ]) ?>

<?php $model->updated_time = time(); ?>

<div class="form-group">
    <?php echo Html::submitButton('Save changes', ['class' => 'section-profile-content-btn']) ?>
</div>

<?php ActiveForm::end(); ?>
