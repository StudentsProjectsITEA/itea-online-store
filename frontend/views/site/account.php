<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Account | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section-profile">
    <div class="section-profile-main container">
        <ul class="section-profile-navmenu">
            <li class="section-profile-navmenu-item active" data-target="personal-info">
                Personal Information
            </li>
            <li class="section-profile-navmenu-item" data-target="change-password">
                Change Password
            </li>
            <li class="section-profile-navmenu-item" data-target="adresses">
                My adresses
            </li>
            <li class="section-profile-navmenu-item" data-target="order-history">
                My Orders
            </li>
            <li class="section-profile-navmenu-item logout">Logout</li>
        </ul>
        <div class="section-profile-content">
            <form action="#" method="POST" id="formPersonalInfo" data-target="personal-info"
                  class="section-profile-content-item active">
                <label class="section-profile-content-label">First name
                    <input name="firstName" type="text" placeholder="Your first name..." class="section-profile-content-input"
                           value="Irina" />
                </label>
                <label class="section-profile-content-label">Last name
                    <input name="secondName" type="text" placeholder="Your second name..." class="section-profile-content-input"
                           value="Stoetskaya" />
                </label>
                <label class="section-profile-content-label">Email address
                    <input name="email" type="text" placeholder="Your e-mail..." class="section-profile-content-input"
                           value="irinastoetski13@gmail.com" />
                </label>
                <button type="submit" class="section-profile-content-btn">
                    Save changes
                </button>
            </form>

            <form action="#" method="POST" data-target="change-password" class="section-profile-content-item">
                <label class="section-profile-content-label">
                    Current password
                    <input type="password" placeholder="Your current password..." class="section-profile-content-input"
                           value="" />
                </label>
                <label class="section-profile-content-label">New Password
                    <input type="password" placeholder="Your new password..." class="section-profile-content-input" value="" />
                </label>
                <label class="section-profile-content-label">Confirm new password
                    <input type="password" placeholder="Confirm new password..." class="section-profile-content-input"
                           value="" />
                </label>
                <button type="submit" class="section-profile-content-btn">
                    Save password
                </button>
            </form>
            <form action="#" method="POST" id="formAdresses" data-target="adresses" class="section-profile-content-item">
                <label class="section-profile-content-label">Your adress
                    <input type="text" placeholder="Your adress" class="section-profile-content-input"
                           value="Kiev, Street of Red Lights, 1" />
                </label>

                <button type="button" class="section-profile-content-btn" id="addNewAdress">
                    Add new adress
                </button>

                <button type="submit" class="section-profile-content-btn">
                    Save changes
                </button>
            </form>

            <div class="section-profile-content-item" data-target="order-history">
                <ul class="section-order-history">
                    <li class="order-history-item order-history-item-dark">
                        <p class="order-history-title">Your order - 8685049</p>
                        <p class="order-history-date">Date of order - 12 August 2019</p>
                        <ul class="order-history-list">
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">
                                        Cute Sport Adidas Shoes
                                    </p>
                                    <p class="checkout-product-item-color">Color - black</p>
                                    <p class="checkout-product-item-size">Size - 43</p>
                                    <div class="checkout-product-item-price">
                                        <p>170.59 x 1</p>
                                        <p class="checkout-product-item-price-bold">$170.59</p>
                                    </div>
                                </div>
                            </li>
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">Mango Jacket</p>
                                    <p class="checkout-product-item-color">Color - black</p>
                                    <p class="checkout-product-item-size">Size - l</p>
                                    <div class="checkout-product-item-price">
                                        <p>120 x 1</p>
                                        <p class="checkout-product-item-price-bold">$120.00</p>
                                    </div>
                                </div>
                            </li>
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">Skinny Jeans Gant</p>
                                    <p class="checkout-product-item-color">Color - navy blue</p>
                                    <p class="checkout-product-item-size">Size - s</p>
                                    <div class="checkout-product-item-price">
                                        <p>119.99 x 3</p>
                                        <p class="checkout-product-item-price-bold">$359.97</p>
                                    </div>
                                </div>
                            </li>
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">Skinny Jeans Gant</p>
                                    <p class="checkout-product-item-color">Color - navy blue</p>
                                    <p class="checkout-product-item-size">Size - l</p>
                                    <div class="checkout-product-item-price">
                                        <p>119.99 x 1</p>
                                        <p class="checkout-product-item-price-bold">$119.99</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li></li>

                </ul>
                <ul class="section-order-history">
                    <li class="order-history-item order-history-item-dark">
                        <p class="order-history-title">Your order - 8685049</p>
                        <p class="order-history-date">Date of order - 12 August 2019</p>
                        <ul class="order-history-list">
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">
                                        Cute Sport Adidas Shoes
                                    </p>
                                    <p class="checkout-product-item-color">Color - black</p>
                                    <p class="checkout-product-item-size">Size - 43</p>
                                    <div class="checkout-product-item-price">
                                        <p>170.59 x 1</p>
                                        <p class="checkout-product-item-price-bold">$170.59</p>
                                    </div>
                                </div>
                            </li>
                            <li class="order-history-list-item">
                                <div class="checkout-product-item-description">
                                    <p class="checkout-product-item-model">Mango Jacket</p>
                                    <p class="checkout-product-item-color">Color - black</p>
                                    <p class="checkout-product-item-size">Size - l</p>
                                    <div class="checkout-product-item-price">
                                        <p>120 x 1</p>
                                        <p class="checkout-product-item-price-bold">$120.00</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
            </div>
        </div>
    </div>
</section>