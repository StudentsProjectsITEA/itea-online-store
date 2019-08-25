<?php

namespace frontend\controllers;

use common\components\OrderDetailsViewer;
use common\repositories\OrderRepository;
use frontend\models\ChangePasswordForm;
use frontend\repositories\UserRepository;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /** @var $repository UserRepository */
    private $repository;
    /** @var $repository OrderRepository */
    private $orderRepository;
    /** @var $repository ChangePasswordForm */
    private $changePasswordModel;
    /** @var $orderDetailsViewer OrderDetailsViewer */
    private $orderDetailsViewer;

    /**
     * UserController constructor.
     * {@inheritdoc}
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->repository = Yii::$container->get(UserRepository::class);
        $this->orderRepository = Yii::$container->get(OrderRepository::class);
        $this->changePasswordModel = Yii::$container->get(ChangePasswordForm::class);
        $this->orderDetailsViewer = Yii::$container->get(OrderDetailsViewer::class);
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->repository->findUserById($id);

        return $this->render('view', [
            'model' => $model,
            'userOrders' => $this->orderRepository->findOrdersByUserId($model->id),
            'changePasswordModel' => $this->changePasswordModel,
            'orderDetailsViewer' => $this->orderDetailsViewer,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->repository->findUserById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Your information was successfully changed.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        Yii::$app->session->setFlash('error', 'You make a mistake, please return to the settings menu.');

        return $this->render('view', [
            'model' => $model,
            'userOrders' => $this->orderRepository->findOrdersByUserId($model->id),
            'changePasswordModel' => $this->changePasswordModel,
            'orderDetailsViewer' => $this->orderDetailsViewer,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws Exception
     */
    public function actionChangePassword($id)
    {
        $model = $this->repository->findUserById($id);

        if ($this->changePasswordModel->load(Yii::$app->request->post()) && $this->changePasswordModel->changePassword()) {
            Yii::$app->session->setFlash('success', 'Your password was successfully changed.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        Yii::$app->session->setFlash('error', 'You make a mistake, please return to the change password menu.');

        return $this->render('view', [
            'model' => $model,
            'userOrders' => $this->orderRepository->findOrdersByUserId($model->id),
            'changePasswordModel' => $this->changePasswordModel,
            'orderDetailsViewer' => $this->orderDetailsViewer,
        ]);
    }

    /**
     * Logs out the current user.
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
