<?php

namespace frontend\controllers;

use common\helpers\OrderDetails;
use devanych\cart\Cart;
use frontend\models\CheckoutForm;
use frontend\models\User;
use frontend\repositories\UserRepository;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use Yii;

class CheckoutController extends BaseController
{
    /** @var Cart $cart */
    private $cart;
    /** @var CheckoutForm $checkoutForm */
    private $checkoutForm;
    /* @var OrderDetails */
    private $orderDetails;

    /**
     * CheckoutController constructor.
     * {@inheritdoc}
     * @param CheckoutForm $checkoutForm
     * @param OrderDetails $orderDetails
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        UserRepository $userRepository,
        CheckoutForm $checkoutForm,
        OrderDetails $orderDetails,
        $config = []
    )
    {
        $this->layout = 'main-layout';
        $this->cart = Yii::$app->cart;
        $this->checkoutForm = $checkoutForm;
        $this->orderDetails = $orderDetails;
        parent::__construct($id, $module, $userRepository, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                        ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
            'orderDetails' => $this->orderDetails,
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
            'orderDetails' => $this->orderDetails,
        ]);
    }
}
