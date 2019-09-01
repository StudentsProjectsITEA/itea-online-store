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
 * @property int $home_number
 * @property int $cardNumber
 * @property string $nameOnCard
 * @property int $expiryMonth
 * @property int $expiryYear
 * @property int $cvcCode
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
    public $home_number;
    public $cardNumber;
    public $nameOnCard;
    public $expiryMonth;
    public $expiryYear;
    public $cvcCode;

    private $message = [
        'name' => 'You can use letters, apostrophe and space.',
        'email' => 'Email must be correct.',
        'mobile' => 'Your mobile number must be in format: 380123456789.',
        'card' => 'Your card number must be in format: 1234567812345678.',
        'expiry_month' => 'Month must be correct.',
        'expiry_year' => 'Year must be correct.',
        'cvc' => 'CVC-code must be correct.',
    ];
    private $regularWord = [
        'name' => '/^([a-zA-Zа-яА-Я\' ]+)$/ui',
        'email' => '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,8})$/',
        'mobile' => '/^[0-9]{12}+$/',
        'card' => '/^[0-9]{16}+$/',
        'expiry_month' => '/^[0-9]{2}+$/',
        'expiry_year' => '/^[0-9]{4}+$/',
        'cvc' => '/^[0-9]{3}+$/',
    ];

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'mobile', 'email', 'payment_id', 'shipping_id', 'country', 'city', 'street', 'home_number'], 'required'],
            [['payment_id', 'shipping_id', 'home_number'], 'integer'],
            [['country', 'city', 'street'], 'string', 'max' => 255],
            [['first_name', 'last_name', 'country', 'city', 'street', 'nameOnCard'], 'match', 'pattern' => $this->regularWord['name'], 'message' => $this->message['name']],

            ['email', 'match', 'pattern' => $this->regularWord['email'], 'message' => $this->message['email']],
            ['mobile', 'match', 'pattern' => $this->regularWord['mobile'], 'message' => $this->message['mobile']],
            ['cardNumber', 'match', 'pattern' => $this->regularWord['card'], 'message' => $this->message['card']],
            ['expiryMonth', 'match', 'pattern' => $this->regularWord['expiry_month'], 'message' => $this->message['expiry_month']],
            ['expiryYear', 'match', 'pattern' => $this->regularWord['expiry_year'], 'message' => $this->message['expiry_year']],
            ['cvcCode', 'match', 'pattern' => $this->regularWord['cvc'], 'message' => $this->message['cvc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment Method ',
            'shipping_id' => 'Shipping Method',
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

        if (!$this->validate()) {
            return null;
        }

        $transaction = $order->getDb()->beginTransaction();

        $order->id = Uuid::uuid4()->toString();
        $order->status_id = $order::STATUS_NEW;
        $order->payment_id = $this->payment_id;
        $order->shipping_id = $this->shipping_id;
        $order->shipping_address = $this->country . ', ' . $this->city . ', ' . $this->street . ', ' . $this->home_number;
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
