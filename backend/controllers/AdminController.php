<?php

namespace backend\controllers;

use backend\models\SettingsForm;
use backend\repositories\AdminRepository;
use Exception;
use Throwable;
use Yii;
use backend\models\Admin;
use backend\models\AdminSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends BaseController
{
    /** @var AdminSearch $adminSearch */
    private $adminSearch;
    /** @var SettingsForm $settingsForm */
    private $settingsForm;

    /**
     * AdminController constructor.
     * {@inheritdoc}
     * @param AdminSearch $adminSearch
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        AdminSearch $adminSearch,
        SettingsForm $settingsForm,
        $config = []
    )
    {
        $this->adminSearch = $adminSearch;
        $this->settingsForm = $settingsForm;
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
                            'index',
                            'view',
                            'create',
                            'search',
                            ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
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
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->adminSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->adminRepository->findAdminById($id),
            'settingsForm' => $this->settingsForm,
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \yii\base\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->adminRepository->findAdminById($id);

        if ($this->settingsForm->load(Yii::$app->request->post()) && $this->settingsForm->changeInformation()) {
            Yii::$app->session->setFlash('success', 'Your information was successfully changed.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        Yii::$app->session->setFlash('error', 'You make a mistake, please return to the settings menu.');

        return $this->render('view', [
            'model' => $model,
            'settingsForm' => $this->settingsForm,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->adminRepository->findAdminById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->adminSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->adminSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
