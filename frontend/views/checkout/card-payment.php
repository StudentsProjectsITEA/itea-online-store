<?php

use frontend\models\CheckoutForm;
use frontend\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $model CheckoutForm */
/* @var $form ActiveForm */
/* @var $user User */

?>

<p class="checkout-delivery-details-title">
    <?php echo Html::encode('Please enter your payment details') ?>
</p>
<div class="checkout-d-flex-row">

    <?php echo $form
        ->field($model, 'cardNumber')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Card number...',
        ])
        ->label('Card number', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>

    <?php echo $form
        ->field($model, 'nameOnCard')
        ->textInput([
            'class' => 'checkout-delivery-content-input',
            'placeholder' => 'Full name on card...',
            'value' => $user->first_name ?? '',
        ])
        ->label('Name on card', [
            'class' => 'checkout-delivery-content-label',
        ]) ?>
</div>

<div class="checkout-payment-below-block">
    <div class="checkout-payment-expdate-block">
        <div class="checkout-payment-content-label">
            <?php echo Html::encode('Expiry date MM/YYYY') ?>
        </div>
        <div class="checkout-payment-exp">

            <?php echo $form
                ->field($model, 'expiryMonth', [
                    'options' => [
                        'tag' => false,
                    ],
                ])
                ->textInput([
                    'class' => 'checkout-payment-exp-input',
                    'placeholder' => 'MM',
                ])
                ->label(false) ?>

            <span>&nbsp;/&nbsp;</span>

            <?php echo $form
                ->field($model, 'expiryYear', [
                    'options' => [
                        'tag' => false,
                    ],
                ])
                ->textInput([
                    'class' => 'checkout-payment-exp-input',
                    'placeholder' => 'YYYY',
                ])
            ->label(false) ?>

        </div>
    </div>

    <div class="checkout-payment-expdate-block">
        <div class="checkout-payment-content-label">
            <?php echo Html::encode('CVC') ?>
        </div>

        <?php echo $form
            ->field($model, 'cvcCode', [
                'options' => [
                    'tag' => false
                ],
            ])
            ->textInput([
                'class' => 'checkout-payment-exp-input',
                'placeholder' => 'CVC',
            ])
            ->label(false) ?>

    </div>
</div>
