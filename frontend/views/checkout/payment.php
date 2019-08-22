<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

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
