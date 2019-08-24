<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

<ul class="checkout-product-list">
    <?php foreach ($cartItems as $item): ?>
        <li class="checkout-product-item">
            <?php echo Html::img('@web/img/' . $item->getProduct()->main_photo, [
                'class' => 'basket-item-img',
                'href' => Url::to(['product/view', 'id' => $item->getId()]),
            ]) ?>
            <div class="checkout-product-item-block">
                <div class="checkout-product-item-details">
                    <div class="checkout-product-item-description">
                        <p class="checkout-product-item-model">
                            <?php echo Html::encode($item->getProduct()->title) ?>
                        </p>
                        <p class="checkout-product-item-color">
                            <?php echo Html::encode('Color: ' . $item->getProduct()->quantity) ?>
                        </p>
                        <p class="checkout-product-item-size">
                            <?php echo Html::encode('Size: ' . $item->getProduct()->quantity) ?>
                        </p>
                    </div>
                </div>
                <div class="checkout-product-item-price">
                    <p>
                        <?php echo Html::encode($item->getProduct()->price . ' ₴ x ' . $item->getQuantity()) ?>
                    </p>
                    <p class="checkout-product-item-price-bold">
                        <?php echo Html::encode(($item->getProduct()->price * $item->getQuantity()) . ' ₴') ?>
                    </p>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
