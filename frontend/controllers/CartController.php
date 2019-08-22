<?php

namespace frontend\controllers;

use common\repositories\ProductRepository;
use devanych\cart\Cart;
use DomainException;
use frontend\components\CartViewer;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use Yii;

class CartController extends Controller
{
    /** @var ProductRepository */
    private $productRepository;
    /** @var CartViewer */
    private $cartViewer;
    /** @var Cart $cart */
    private $cart;

    /**
     * CartController constructor.
     * {@inheritdoc}
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->cartViewer = Yii::$container->get(CartViewer::class);
        $this->productRepository = Yii::$container->get(ProductRepository::class);
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

    /**
     * @param string $id
     * @param int $qty
     *
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function actionAdd(string $id, $qty = 1)
    {
        try {
            $product = $this->productRepository->findProductById($id);
            $quantity = $this->cartViewer->getQuantity($qty, $product->quantity);
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

    /**
     * @param $id
     * @param int $qty
     *
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function actionChange($id, $qty = 1)
    {
        try {
            $product = $this->productRepository->findProductById($id);
            $quantity = $this->cartViewer->getQuantity($qty, $product->quantity);
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->change($item->getId(), $quantity);
            }
        } catch (DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     *
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function actionRemove($id)
    {
        try {
            $product = $this->productRepository->findProductById($id);
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
