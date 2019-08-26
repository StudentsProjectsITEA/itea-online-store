<?php

namespace common\helpers;

class OrderDetails
{
    const PAYMENT_BANK_TRANSFER = 1;
    const PAYMENT_CASH_RECEIPT = 2;
    const PAYMENT_CARD_ONLINE = 3;

    const SHIPPING_PICKUP = 1;
    const SHIPPING_COURIER = 2;
    const SHIPPING_POST_OFFICE = 3;

    public $shippingTitle = [
        'pickup' => 'Pickup Shipping',
        'courier' => 'Courier Shipping',
        'post-office' => 'Post Office Shipping',
    ];
    public $shippingDescription = [
        'pickup' => '<b>' . 'Pickup Shipping' . '</b><br>' . 'Price: 0 ₴',
        'courier' => '<b>' . 'Courier Shipping' . '</b><br>' . 'Shipping time: 1-2 days' . '<br>' . 'Price: 100 ₴',
        'post-office' => '<b>' . 'Post Office Shipping' . '</b><br>' . 'Shipping time: 3-5 days' . '<br>' . 'Price: 80 ₴',
    ];
    public $paymentTitle = [
        'bank-transfer' => 'Bank Transfer Payment',
        'cash-receipt' => 'Cash on Receipt Payment',
        'card' => 'Card Payment',
    ];
    public $paymentDescription = [
        'bank-transfer' => '<b>' . 'Bank Transfer Payment' . '</b><br>' . 'You can pay for the order by transferring to a card.',
        'cash-receipt' => '<b>' . 'Cash on Receipt Payment' . '</b><br>' . 'You can pay for the order upon receipt.',
        'card' => '<b>' . 'Card Payment' . '</b><br>' . 'You can pay for the order online through the card details.',
    ];
}