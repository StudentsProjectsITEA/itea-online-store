<?php

namespace frontend\controllers;

use devanych\cart\Cart;
use yii\web\Controller;
use Yii;

class CheckoutController extends Controller
{
    /** @var Cart $cart */
    private $cart;

    /**
     * CheckoutController constructor.
     * {@inheritdoc}
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->cart = Yii::$app->cart;
        parent::__construct($id, $module, $config);
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $cartItems = $this->cart->getItems();

        return $this->render('index', [
            'cart' => $this->cart,
            'cartItems' => $cartItems,
        ]);
    }
}
