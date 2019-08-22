<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Cart', 'url' => ['cart']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h2 class="sub-page__title"><?= Html::encode($this->title) ?></h2>
<section class="checkout-page container">
    <div class="checkout">
        <ul class="checkout-product-list">
            <li class="checkout-product-item">
                <img
                        src="<?php echo Url::to('@web/img/img_1.jpg'); ?>"
                        alt=""
                        class="checkout-product-item-img"
                />
                <div class="checkout-product-item-block">
                    <div class="checkout-product-item-details">
                        <div class="checkout-product-item-description">
                            <p class="checkout-product-item-model">
                                Cute Sport Adidas Shoes
                            </p>
                            <p class="checkout-product-item-color">Color - black</p>
                            <p class="checkout-product-item-size">Size - 43</p>
                        </div>
                    </div>
                    <div class="checkout-product-item-price">
                        <p>$170.59 x 1</p>
                        <p class="checkout-product-item-price-bold">$170.59</p>
                    </div>
                </div>
            </li>
            <li class="checkout-product-item">
                <img
                        src="<?php echo Url::to('@web/img/img_2.jpg'); ?>"
                        alt=""
                        class="checkout-product-item-img"
                />
                <div class="checkout-product-item-block">
                    <div class="checkout-product-item-details">
                        <div class="checkout-product-item-description">
                            <p class="checkout-product-item-model">Mango Jacket</p>
                            <p class="checkout-product-item-color">Color - black</p>
                            <p class="checkout-product-item-size">Size - l</p>
                        </div>
                    </div>
                    <div class="checkout-product-item-price">
                        <p>$120 x 1</p>
                        <p class="checkout-product-item-price-bold">$120.00</p>
                    </div>
                </div>
            </li>
        </ul>
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
        <div class="checkout-final-order">
            <h3 class="basket-final-order-title">My order</h3>
            <ul class="basket-final-order-info">
                <li>
                    <span class="title">Price</span><span class="price">$290.59</span>
                </li>
                <li>
                    <span class="title">Delivery</span><span class="price">$5</span>
                </li>
                <li>
                    <span class="title">Total</span><span class="price">$295.59</span>
                </li>
            </ul>
        </div>
        <!--<div class="modal-backdrop">
            <div class="modal-success">
                <p class="modal-success-order-text">Your order was successfully placed in our store.</p>
                <p class="modal-success-order-text">Details of your order was sent to your email</p>
                <p class="modal-success-order-text-number">ORDER ID: </p><a class="active" aria-current="page" href="<?php /*echo Url::toRoute('checkout', true); */?>"><input
                            type="button" class="modal-success-order-btn" value="Ok"></a>
            </div>
        </div>-->
</section>
