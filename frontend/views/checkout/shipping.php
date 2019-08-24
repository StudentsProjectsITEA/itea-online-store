<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

<div class="checkout-delivery-method">
    <p class="checkout-delivery-details-title">
        Choose one of delivery method
    </p>
    <ul class="checkout-delivery-list">
        <li>
            <input
                    class="delivery-input"
                    type="radio"
                    name="deliveryFilter"
                    id="economical"
                    value="economical"
            /><label
                    class="delivery-link"
                    title="economical"
                    for="economical"
            >
                <div class="delivery-link-block">
                    <p>Delivery - economical</p>
                    <p>Estimated delivery - 14 days</p>
                    <p>Price - $0</p>
                </div>
            </label>
        </li>
        <li>
            <input
                    class="delivery-input"
                    type="radio"
                    name="deliveryFilter"
                    id="standart"
                    value="standart"
                    checked=""
            /><label class="delivery-link" title="standart" for="standart">
                <div class="delivery-link-block">
                    <p>Delivery - standart</p>
                    <p>Estimated delivery - 7 days</p>
                    <p>Price - $5</p>
                </div>
            </label>
        </li>
        <li>
            <input
                    class="delivery-input"
                    type="radio"
                    name="deliveryFilter"
                    id="express"
                    value="express"
            /><label class="delivery-link" title="express" for="express">
                <div class="delivery-link-block">
                    <p>Delivery - express</p>
                    <p>Estimated delivery - 3 days</p>
                    <p>Price - $10</p>
                </div>
            </label>
        </li>
    </ul>
</div>
