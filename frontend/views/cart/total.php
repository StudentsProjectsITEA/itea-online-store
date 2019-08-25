<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $cart Cart */

?>

<div class="basket-final-order">
    <h3 class="basket-final-order-title">
        <?php echo Html::encode('My order') ?>
    </h3>
    <ul class="basket-final-order-info">
        <li>
            <span class="title">
                <?php echo Html::encode('Total quantity') ?>
            </span>
            <span class="price">
                <?php echo Html::encode($cart->getTotalCount() . ' item(s)') ?>
            </span>
        </li>
        <li>
            <span class="title">
                <?php echo Html::encode('Total price') ?>
            </span>
            <span class="price">
                <?php echo Html::encode($cart->getTotalCost() . ' ₴') ?>
            </span>
        </li>
    </ul>
    <?php echo Html::beginForm('/checkout') ?>
    <?php echo Html::submitButton('Checkout', ['class' => 'btn-add-to-cart']) ?>
    <?php echo Html::endForm(); ?>
</div>
