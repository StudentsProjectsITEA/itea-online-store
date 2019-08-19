<?php

namespace app\controllers;

use devanych\cart\Cart;
use DomainException;
use frontend\repositories\CartRepository;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    private $repository;
    /** @var Cart $cart */
    private $cart;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = 'main-layout';
        $this->repository = new CartRepository();
        $this->cart = Yii::$app->cart;
    }

    public function actionIndex()
    {
        $cartItems = $this->cart->getItems();

        return $this->render('index', [
            'cart' => $this->cart,
            'cartItems' => $cartItems,
        ]);
    }

    public function actionAdd($id, $qty = 1)
    {
        try {
            $product = $this->repository->getProduct($id);
            $quantity = $this->repository->getQuantity($qty, $product->quantity);
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->plus($item->getId(), $quantity);
            } else {
                $this->cart->add($product, $quantity);
            }
        } catch (DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    public function actionChange($id, $qty = 1)
    {
        try {
            $product = $this->repository->getProduct($id);
            $quantity = $this->repository->getQuantity($qty, $product->quantity);
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->change($item->getId(), $quantity);
            }
        } catch (DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        try {
            $product = $this->repository->getProduct($id);
            $this->cart->remove($product->id);
        } catch (DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    public function actionClear()
    {
        $this->cart->clear();

        return $this->redirect(['index']);
    }
}
