<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use backend\models\LoginForm;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /** @var LoginForm $model */
    private $adminLogin;

    /**
     * SiteController constructor.
     * {@inheritdoc}
     * @param LoginForm $loginForm
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        LoginForm $adminLogin,
        $config = []
    )
    {
        $this->adminLogin = $adminLogin;
        parent::__construct($id, $module, $adminRepository, $config);
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
                            'login',
                            ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [
                            'logout',
                            'index',
                            ],
                        'allow' => true,
                        'roles' => ['@'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login-layout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($this->adminLogin->load(Yii::$app->request->post()) && $this->adminLogin->login()) {
            return $this->goBack();
        } else {
            $this->adminLogin->password = '';

            return $this->render('login', [
                'model' => $this->adminLogin,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays example blank page.
     *
     * @return string
     */
    public function actionBlank()
    {
        return $this->render('blank');
    }

    /**
     * Displays example page with Advanced Forms.
     *
     * @return string
     */
    public function actionAdvancedForms()
    {
        return $this->render('advanced-forms');
    }

    /**
     * Displays example page with General Forms.
     *
     * @return string
     */
    public function actionGeneralForms()
    {
        return $this->render('general-forms');
    }

    /**
     * Displays example page with Simple Tables.
     *
     * @return string
     */
    public function actionSimpleTables()
    {
        return $this->render('simple-tables');
    }
}
