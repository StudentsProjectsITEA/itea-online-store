<?php

use common\models\Order;
use frontend\models\CheckoutForm;
use frontend\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $model CheckoutForm */
/* @var $form ActiveForm */
/* @var $user User */

?>

<?php $form = ActiveForm::begin(['action' => '/checkout/create']); ?>

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

<div class="checkout-delivery-method">
    <p class="checkout-delivery-details-title">
        <?php echo Html::encode('Choose one of shipping method') ?>
    </p>
    <ul class="checkout-delivery-list">
        <?php echo $form
            ->field($model, 'shipping_id', [
                'options' => [
                    'tag' => false
                ],
            ])
            ->radioList(
                [
                    (new Order())::SHIPPING_PICKUP => 'pickup',
                    (new Order())::SHIPPING_COURIER => 'courier',
                    (new Order())::SHIPPING_POST_OFFICE => 'post-office'
                ],
                [
                    'item' => function ($index, $label, $name, $checked, $value) {

                        $item = '<li>';
                        $item .= '<input id="' . $label . '" class="delivery-input" type="radio" name="' . $name . '" value="' . $value . '">';
                        $item .= '<label class="delivery-link" title="' . (new Order())->shippingTitle[$label] . '" for="' . $label . '">';
                        $item .= '<div class="delivery-link-block">';
                        $item .= '<p>' . (new Order())->shippingDescription[$label] . '</p>';
                        $item .= '</div></label></li>';

                        return $item;
                    }
                ]
            )
            ->label(false); ?>
    </ul>
</div>

<div class="checkout-delivery-method">
    <p class="checkout-delivery-details-title">
        <?php echo Html::encode('Choose one of payment method') ?>
    </p>
    <ul class="checkout-delivery-list">
        <?php echo $form
            ->field($model, 'payment_id', [
                'options' => [
                    'tag' => false
                ],
            ])
            ->radioList(
                [
                    (new Order())::PAYMENT_BANK_TRANSFER => 'bank-transfer',
                    (new Order())::PAYMENT_CASH_RECEIPT => 'cash-receipt',
                    (new Order())::PAYMENT_CARD_ONLINE => 'card'
                ],
                [
                    'item' => function ($index, $label, $name, $checked, $value) {

                        $item = '<li>';
                        $item .= '<input id="' . $label . '" class="delivery-input" type="radio" name="' . $name . '" value="' . $value . '">';
                        $item .= '<label class="delivery-link" title="' . (new Order())->paymentTitle[$label] . '" for="' . $label . '">';
                        $item .= '<div class="delivery-link-block">';
                        $item .= '<p>' . (new Order())->paymentDescription[$label] . '</p>';
                        $item .= '</div></label></li>';

                        return $item;
                    }
                ]
            )
            ->label(false); ?>
    </ul>
</div>

<?php echo $this->render('card-payment', [
    'model' => $model,
    'form' => $form,
    'user' => $user,
]) ?>

<?php echo Html::submitButton('Place order', ['class' => 'section-profile-content-btn']) ?>

<?php ActiveForm::end(); ?>
