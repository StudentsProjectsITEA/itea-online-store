<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /** @var LoginForm $model */
    private $model;

    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->model = new LoginForm();
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            /*
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            */
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
                'layout' => 'main',
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
        if (Yii::$app->user->isGuest) {
            return $this->render('login', [
                'model' => $this->model,
            ]);
        }

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

        if ($this->model->load(Yii::$app->request->post()) && $this->model->login()) {
            return $this->goBack();
        } else {
            $this->model->password = '';

            return $this->render('login', [
                'model' => $this->model,
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

    /**
     * Displays admin account.
     *
     * @return string
     */
    public function actionAccount()
    {
        return $this->render('account');
    }
}
