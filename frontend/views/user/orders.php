<?php

use common\models\Order;
use yii\helpers\Html;

/* @var $userOrders array */
/* @var $order Order */
?>

<div class="section-profile-content-item" data-target="order-history">
    <ul class="section-order-history">
        <?php foreach ($userOrders as $order) : ?>
            <li class="order-history-item order-history-item-dark">

                <p class="order-history-title">
                    <?php echo Html::encode('Your order id - ' . $order->id) ?>
                </p>

                <p class="order-history-date">
                    <?php echo Html::encode('Date of order - ' . date('d.m.Y H:i:s', $order->created_time + (3 * 60 * 60))) ?>
                </p>

                <p class="order-history-shipping">
                    <?php echo Html::encode('Shipping address - ' . $order->shipping_address) ?>
                </p>

                <ul class="order-history-list"><?php $total = [];
                    foreach ($order->productOrders as $productOrder) : ?>

                        <li class="order-history-list-item">
                            <div class="checkout-product-item-description">

                                <p class="checkout-product-item-model">
                                    <?php echo Html::a(Html::encode($productOrder->product->title), ['product/view', 'id' => $productOrder->product->id]) ?>
                                </p>

                                <p class="checkout-product-item-color">
                                    <?php echo $productOrder->color_value !== null ? Html::encode('Color: ' . $productOrder->color_value) : null ?>
                                </p>

                                <p class="checkout-product-item-size">
                                    <?php echo $productOrder->size_value !== null ? Html::encode('Size: ' . $productOrder->size_value) : null ?>
                                </p>

                                <div class="checkout-product-item-price">
                                    <p><?php $price = $productOrder->product->price;
                                        echo Html::encode($price) . ' ₴ x '; ?>
                                        <?php $qty = $productOrder->quantity;
                                        echo Html::encode($qty) ?>
                                    </p>
                                    <p class="checkout-product-item-price-bold">
                                        <?php $total[] = $price * $qty;
                                        echo Html::encode($price * $qty) . ' ₴' ?></p>
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
