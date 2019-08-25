<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $cart Cart */

?>

<div class="checkout-final-order">
    <h3 class="basket-final-order-title">
        <?php echo Html::encode('My order') ?>
    </h3>
    <ul class="basket-final-order-info">
        <li>
            <span class="title">
                <?php echo Html::encode('Price') ?>
            </span><span class="price">
                <?php echo Html::encode($cart->getTotalCost() . ' ₴') ?>
            </span>
        </li>
        <li>
            <span class="title">
                <?php echo Html::encode('Shipping') ?>
            </span>
            <span class="price">
                <?php echo Html::encode('50 ₴') ?>
            </span>
        </li>
        <li>
            <span class="title">
                <?php echo Html::encode('Total') ?>
            </span>
            <span class="price">
                <?php echo Html::encode(($cart->getTotalCost() + 50) . ' ₴') ?>
            </span>
        </li>
    </ul>
</div>
