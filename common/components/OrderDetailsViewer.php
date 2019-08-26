<?php

namespace common\components;

use common\helpers\OrderDetails;
use common\models\Order;

/**
 * Class OrderDetailsViewer
 * @package common\components
 */
class OrderDetailsViewer
{
    private $shippingTitle;
    private $shippingDescription;
    private $paymentTitle;
    private $paymentDescription;
    /* @var OrderDetails */
    private $orderDetails;

    public function __construct(OrderDetails $orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * @param Order $order
     */
    public function setShippingInformation(Order $order)
    {
        if ($this->orderDetails::SHIPPING_PICKUP === $order->shipping_id) {
            $this->shippingTitle = 'Pickup Shipping';
            $this->shippingDescription = 'Price: 0 ₴.';
        } elseif ($this->orderDetails::SHIPPING_COURIER === $order->shipping_id) {
            $this->shippingTitle = 'Courier Shipping';
            $this->shippingDescription = 'Shipping time: 1-2 days. Price: 100 ₴.';
        } elseif ($this->orderDetails::SHIPPING_POST_OFFICE === $order->shipping_id) {
            $this->shippingTitle = 'Post Office Shipping';
            $this->shippingDescription = 'Shipping time: 3-5 days. Price: 80 ₴.';
        }
    }

    /**
     * @param Order $order
     */
    public function setPaymentInformation(Order $order)
    {
        if ($this->orderDetails::PAYMENT_BANK_TRANSFER === $order->payment_id) {
            $this->paymentTitle = 'Bank Transfer Payment';
            $this->paymentDescription = 'You can pay for the order by transferring to a card.';
        } elseif ($this->orderDetails::PAYMENT_CASH_RECEIPT === $order->payment_id) {
            $this->paymentTitle = 'Cash on Receipt Payment';
            $this->paymentDescription = 'You can pay for the order upon receipt.';
        } elseif ($this->orderDetails::PAYMENT_CARD_ONLINE === $order->payment_id) {
            $this->paymentTitle = 'Card Payment';
            $this->paymentDescription = 'You can pay for the order online through the card details.';
        }
    }

    /**
     * @return string
     */
    public function getShippingTitle()
    {
        return $this->shippingTitle;
    }

    /**
     * @return string
     */
    public function getShippingDescription()
    {
        return $this->shippingDescription;
    }

    /**
     * @return string
     */
    public function getPaymentTitle()
    {
        return $this->paymentTitle;
    }

    /**
     * @return string
     */
    public function getPaymentDescription()
    {
        return $this->paymentDescription;
    }
}