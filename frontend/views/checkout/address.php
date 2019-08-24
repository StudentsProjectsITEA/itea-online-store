<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

<p class="checkout-delivery-details-title">
    Please enter your address
</p>

<div class="checkout-d-flex-row">

    <label class="checkout-delivery-content-label">Country
        <input
                name="country"
                type="text"
                placeholder="Your country..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>


    <label class="checkout-delivery-content-label">Zipcode
        <input
                name="zipcode"
                type="text"
                placeholder="Your zipcode..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>

    <label class="checkout-delivery-content-label">Phone
        <input
                name="phone"
                type="text"
                placeholder="Your phone number..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>

    <label class="checkout-delivery-content-label">City
        <input
                name="city"
                type="text"
                placeholder="Your city..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>

    <label class="checkout-delivery-content-label">Street
        <input
                name="street"
                type="text"
                placeholder="Your street..."
                class="checkout-delivery-content-input"
                value=""
        />
    </label>
</div>
