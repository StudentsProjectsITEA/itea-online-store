<?php

namespace frontend\controllers;

use common\components\OrderDetailsViewer;
use common\repositories\OrderRepository;
use frontend\models\ChangePasswordForm;
use frontend\repositories\UserRepository;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{
    /** @var $repository OrderRepository */
    private $orderRepository;
    /** @var $repository ChangePasswordForm */
    private $changePasswordModel;
    /** @var $orderDetailsViewer OrderDetailsViewer */
    private $orderDetailsViewer;

    /**
     * UserController constructor.
     * {@inheritdoc}
     * @param OrderRepository $orderRepository
     * @param ChangePasswordForm $changePasswordForm
     * @param OrderDetailsViewer $orderDetailsViewer
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        ChangePasswordForm $changePasswordForm,
        OrderDetailsViewer $orderDetailsViewer,
        $config = []
    )
    {
        $this->orderRepository = $orderRepository;
        $this->changePasswordModel = $changePasswordForm;
        $this->orderDetailsViewer = $orderDetailsViewer;
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
                            'view',
                            'update',
                            'change-password',
                            'logout',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash('error', 'You do not have access to this page.');
                },
            ],
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
        $model = $this->userRepository->findUserById($id);

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
        $model = $this->userRepository->findUserById($id);

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
        $model = $this->userRepository->findUserById($id);

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
