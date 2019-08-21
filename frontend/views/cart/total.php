<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $cart Cart */

?>

<div class="basket-final-order">
    <h3 class="basket-final-order-title">My order</h3>
    <ul class="basket-final-order-info">
        <li>
            <span class="title">Total quantity</span>
            <span class="price"><?php echo Html::encode($cart->getTotalCount() . ' item(s)') ?></span>
        </li>
        <li>
            <span class="title">Total price</span>
            <span class="price"><?php echo Html::encode($cart->getTotalCost() . ' ₴') ?></span>
        </li>
    </ul>
    <button type="submit" class="btn-add-to-cart">Checkout</button>
</div>
