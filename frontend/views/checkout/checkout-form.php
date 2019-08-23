<?php

use frontend\models\CheckoutForm;
use frontend\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $model CheckoutForm */
/* @var $form ActiveForm */
/* @var $user User */

?>

<?php $form = ActiveForm::begin(['action' => 'checkout/create']); ?>

<p class="checkout-delivery-details-title">
    <?php echo Html::encode('Please enter your shipping information') ?>
</p>

<div class="checkout-d-flex-row">

    <?php echo $form
        ->field($model, 'first_name')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your first name...',
            'value' => $user->first_name ?? '',
        ])
        ->label('First Name', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'last_name')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your last name...',
            'value' => $user->last_name ?? '',
        ])
        ->label('Last Name', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'mobile')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your mobile...',
            'value' => $user->mobile ?? '',
        ])
        ->label('Mobile number', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'email')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your email...',
            'value' => $user->email ?? '',
        ])
        ->label('Email address', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'country')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your country...',
            'value' => $model->country,
        ])
        ->label('Country', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'city')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your city...',
            'value' => $model->city,
        ])
        ->label('City', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'street')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Your street...',
            'value' => $model->street,
        ])
        ->label('Street', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

</div>

<?php echo $this->render('shipping', [
    'model' => $model,
    'form' => $form,
]) ?>

<?php echo $this->render('payment', [
    'model' => $model,
    'form' => $form,
]) ?>

<?php echo Html::submitButton('Place order', ['class' => 'section-profile-content-btn']) ?>

<?php ActiveForm::end(); ?>

