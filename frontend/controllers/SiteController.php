<?php

namespace frontend\controllers;

use common\models\ProductSearch;
use common\components\CategoryViewer;
use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use frontend\repositories\UserRepository;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use frontend\models\LoginForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use Yii;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /* @var ProductRepository */
    private $productRepository;
    /* @var CategoryRepository */
    private $categoryRepository;
    /* @var CategoryViewer */
    private $categoryViewer;
    /* @var ProductSearch */
    private $productSearchModel;
    /* @var SignupForm */
    private $signupForm;
    /* @var LoginForm */
    private $loginForm;

    /**
     * SiteController constructor.
     * {@inheritdoc}
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param CategoryViewer $categoryViewer
     * @param ProductSearch $productSearch
     * @param SignupForm $signupForm
     * @param LoginForm $loginForm
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        UserRepository $userRepository,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        CategoryViewer $categoryViewer,
        ProductSearch $productSearch,
        SignupForm $signupForm,
        LoginForm $loginForm,
        $config = []
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryViewer = $categoryViewer;
        $this->productSearchModel = $productSearch;
        $this->signupForm = $signupForm;
        $this->loginForm = $loginForm;
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
                            'login',
                            'registration',
                            'reset-password',
                            'verify-email',
                            'resend-verification-email',
                            'contact',
                            'about',
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'main-layout',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     *
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function actionIndex()
    {
        $allSubCategories = $this->categoryViewer->getSubCategories();
        $count = Yii::$app->params['countOfProductsOnMainPage'];

        return $this->render('index', [
            'allCategories' => $this->categoryViewer->getCategories($allSubCategories),
            'popularProducts' => $this->productRepository->findPopularProducts(),
            'popularCategories' => $this->categoryRepository->findPopularCategories(),
            'categoriesFind' => $this->categoryRepository,
            'dataProvider' => $this->productSearchModel->search($count, Yii::$app->request->queryParams),
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = $this->loginForm;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/account/' . Yii::$app->user->id]);
        } else {
            $model->password = '';

            return $this->render('login', [
                'loginModel' => $model,
                'registrationModel' => $this->signupForm,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function actionRegistration()
    {
        $model = $this->signupForm;
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Welcome to your account.');
            $this->loginForm->username = $model->username;
            $this->loginForm->password = $model->password;
            $this->loginForm->login();
            return $this->redirect(['/account/' . Yii::$app->user->id]);
        }

        return $this->render('login', [
            'registrationModel' => $model,
            'loginModel' => $this->loginForm,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     *
     * @return string|Response
     *
     * @throws BadRequestHttpException
     * @throws Exception
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
