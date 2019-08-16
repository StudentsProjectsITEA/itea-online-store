<?php

use yii\helpers\Html;

/* @var $userOrders array */
/* @var $order common\models\Order */
/* @var $products array */
/* @var $product common\models\Product */
?>

<div class="section-profile-content-item" data-target="order-history">
    <ul class="section-order-history">
        <?php foreach ($userOrders as $order) : ?>
            <li class="order-history-item order-history-item-dark">
                <p class="order-history-title">Your order id - <?php echo Html::encode($order->id) ?></p>
                <p class="order-history-date">Date of order
                    - <?php echo date('d.m.Y H:i:s', Html::encode($order->created_time)) ?></p>
                <p class="order-history-shipping">Shipping address
                    - <?php echo Html::encode($order->shipping_address) ?></p>
                <ul class="order-history-list">
                    <?php $total = []; foreach ($products[$order->id] as $product) : ?>
                        <li class="order-history-list-item">
                            <div class="checkout-product-item-description">
                                <p class="checkout-product-item-model">
                                    <?php echo Html::a(Html::encode($product->title), ['product/view', 'id' => $product->id]) ?>
                                </p>
                                <p class="checkout-product-item-color">Color - black</p>
                                <p class="checkout-product-item-size">Size - 43</p>
                                <div class="checkout-product-item-price">
                                    <p><?php echo Html::encode($product->price) . ' ₴ x '; ?>
                                        <?php foreach ($product->productOrders as $productOrder) : ?>
                                            <?php $qty = $productOrder->quantity; echo Html::encode($qty) ?>
                                            <?php break; endforeach; ?>
                                    </p>
                                    <p class="checkout-product-item-price-bold"><?php $total[] = $product->price * $qty; echo Html::encode($product->price * $qty) . ' ₴' ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <p class="order-history-total">Total price: <?php echo Html::encode(array_sum($total)) . ' ₴' ?></p>
                </ul>
            </li>
        <?php endforeach; ?>
        <li></li>

    </ul>
</div>
