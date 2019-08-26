<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use frontend\repositories\UserRepository;
use frontend\models\User;
use common\models\UserSearch;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{
    /* @var UserRepository $userRepository */
    private $userRepository;
    /* @var UserSearch $userSearch */
    private $userSearch;

    /**
     * ParamController constructor.
     * {@inheritdoc}
     * @param UserSearch $userSearch
     * @param UserRepository $userRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        UserSearch $userSearch,
        UserRepository $userRepository,
        $config = []
    )
    {
        $this->userRepository = $userRepository;
        $this->userSearch = $userSearch;
        parent::__construct($id, $module, $adminRepository, $config);
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->userSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->userRepository->findUserById($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->userRepository->findUserById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->userRepository->findUserById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->userSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->userSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
