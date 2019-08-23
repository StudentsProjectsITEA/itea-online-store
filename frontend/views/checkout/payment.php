<?php

use frontend\models\CheckoutForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $model CheckoutForm */
/* @var $form ActiveForm */

?>

<div class="checkout-delivery-method">
    <p class="checkout-delivery-details-title">
        <?php echo Html::encode('Choose one of payment method') ?>
    </p>
    <ul class="checkout-delivery-list">
        <li>

            <?php echo $form
                ->field($model, 'payment_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'bank-transfer',
                    'class' => 'delivery-input',
                    'value' => 1,
                ]) ?>

            <label class="delivery-link" title="Bank Transfer Payment" for="bank-transfer">
                <div class="payment-link-block">
                    <p>
                        <?php echo Html::encode('Bank Transfer Payment') ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo Html::encode('You can pay for the order by transferring to a card.') ?>
                    </p>
                </div>
            </label>
        </li>
        <li>

            <?php echo $form
                ->field($model, 'payment_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'cash-receipt',
                    'class' => 'delivery-input',
                    'value' => 2,
                    'checked' => '',
                ]) ?>

            <label class="delivery-link" title="Cash on Receipt Payment" for="cash-receipt">
                <div class="payment-link-block">
                    <p>
                        <?php echo Html::encode('Cash on Receipt Payment') ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo Html::encode('You can pay for the order upon receipt.') ?>
                    </p>
                </div>
            </label>
        </li>
        <li>

            <?php echo $form
                ->field($model, 'payment_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'card',
                    'class' => 'delivery-input',
                    'value' => 3,
                ]) ?>

            <label class="delivery-link" title="Card Payment" for="card">
                <div class="payment-link-block">
                    <p>
                        <?php echo Html::encode('Card Payment') ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo Html::encode('You can pay for the order online through the card details.') ?>
                    </p>
                </div>
            </label>
        </li>
    </ul>
</div>

<p class="checkout-delivery-details-title">
    Please enter your payment information
</p>
<div class="checkout-d-flex-row">

    <label class="checkout-delivery-content-label">Card number
        <input
                name="cardNumber"
                type="text"
                placeholder="Card number..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>
    <label class="checkout-delivery-content-label">Name on card
        <input
                name="nameOnCard"
                type="text"
                placeholder="Full name on card..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>
</div>
<div class="checkout-payment-below-block">
    <div class="checkout-payment-expdate-block">
        <div class="checkout-payment-content-label">
            Expiry date MM/YYYY
        </div>
        <div class="checkout-payment-exp">
            <input
                    name="expiryMonth"
                    type="text"
                    placeholder="MM"
                    class="checkout-payment-exp-input"
                    value=""
            /><span>&nbsp;/&nbsp;</span
            ><input
                    name="expiryYear"
                    type="text"
                    placeholder="YYYY"
                    class="checkout-payment-exp-input"
                    value=""
            />
        </div>
    </div>
    <div class="checkout-payment-expdate-block">
        <div class="checkout-payment-content-label">CVC</div>
        <input
                name="cvcCode"
                type="text"
                placeholder="CVC"
                class="checkout-payment-exp-input"
                value=""
        />
    </div>
</div>
