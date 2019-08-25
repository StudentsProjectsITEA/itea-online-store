<?php

namespace frontend\controllers;

use devanych\cart\Cart;
use frontend\models\CheckoutForm;
use frontend\models\User;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class CheckoutController extends Controller
{
    /** @var Cart $cart */
    private $cart;
    /** @var CheckoutForm $cart */
    private $checkoutForm;

    /**
     * CheckoutController constructor.
     * {@inheritdoc}
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->cart = Yii::$app->cart;
        $this->checkoutForm = Yii::$container->get(CheckoutForm::class);
        parent::__construct($id, $module, $config);
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->checkoutForm,
            'user' => User::findOne(Yii::$app->user->id),
            'cart' => $this->cart,
            'cartItems' => $this->cart->getItems(),
        ]);
    }

    /**
     * @return string|Response
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = $this->checkoutForm;
        if ($model->load(Yii::$app->request->post()) && $model->placeOrder()) {
            $this->cart->clear();
            Yii::$app->session->addFlash('success', 'Thanks for your order. We will contact you soon.');
            return $this->goHome();
        }

        return $this->render('index', [
            'model' => $model,
            'user' => User::findOne(Yii::$app->user->id),
            'cart' => $this->cart,
            'cartItems' => $this->cart->getItems(),
        ]);
    }
}
