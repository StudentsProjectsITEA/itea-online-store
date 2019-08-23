<?php

namespace frontend\models;

use common\models\Order;
use common\models\ProductOrder;
use devanych\cart\CartItem;
use Ramsey\Uuid\Uuid;
use Yii;
use yii\db\Exception;
use yii\base\Model;

/**
 * Class CheckoutForm
 * @package frontend\models
 *
 * @property string $first_name
 * @property string $last_name
 * @property int $mobile
 * @property string $email
 * @property int $payment_id
 * @property int $shipping_id
 * @property string $country
 * @property string $city
 * @property string $street
 *
 */
class CheckoutForm extends Model
{
    public $first_name;
    public $last_name;
    public $mobile;
    public $email;
    public $payment_id;
    public $shipping_id;
    public $country;
    public $city;
    public $street;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'mobile', 'email', 'payment_id', 'shipping_id', 'country', 'city', 'street'], 'required'],
            [['payment_id', 'shipping_id', 'country', 'city', 'street'], 'default', 'value' => null],
            [['payment_id', 'shipping_id'], 'integer'],
            [['country', 'city', 'street'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return bool|null
     * @throws Exception
     * @throws \Exception
     */
    public function placeOrder()
    {
        $cart = Yii::$app->cart;
        $order = new Order();
        $order->status_id = $order::STATUS_NEW;

        if (!$this->validate()) {
            return null;
        }

        $transaction = $order->getDb()->beginTransaction();

        $order->id = Uuid::uuid4()->toString();
        $order->payment_id = $this->payment_id;
        $order->shipping_id = $this->shipping_id;
        $order->shipping_address = $this->country . ', ' . $this->city . ', ' . $this->street;
        $order->created_time = time();
        $order->updated_time = time();
        $order->user_id = Yii::$app->user->id ?? '';
        $order->save();

        /* @var $product CartItem */
        foreach ($cart->getItems() as $product) {
            $orderItem = new ProductOrder();
            $orderItem->id = Uuid::uuid4()->toString();
            $orderItem->quantity = $product->getQuantity();
            $orderItem->product_id = $product->getId();
            $orderItem->order_id = $order->id;
            if (!$orderItem->save()) {
                $transaction->rollBack();
                Yii::$app->session->addFlash('error', 'Cannot place your order. Please contact us.');
            }
        }
        $transaction->commit();

        return true;
    }
}
