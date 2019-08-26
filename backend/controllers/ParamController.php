<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\ParamRepository;
use common\models\Param;
use backend\models\ParamSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * ParamController implements the CRUD actions for Param model.
 */
class ParamController extends BaseController
{
    /* @var ParamRepository $paramRepository */
    private $paramRepository;
    /* @var ParamSearch $paramSearch */
    private $paramSearch;

    /**
     * ParamController constructor.
     * {@inheritdoc}
     * @param ParamSearch $paramSearch
     * @param ParamRepository $paramRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        ParamSearch $paramSearch,
        ParamRepository $paramRepository,
        $config = []
    )
    {
        $this->paramRepository = $paramRepository;
        $this->paramSearch = $paramSearch;
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
                            'update',
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
     * Lists all Param models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->paramSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Param model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->paramRepository->findParamById($id),
        ]);
    }

    /**
     * Creates a new Param model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Param();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Param model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->paramRepository->findParamById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Param model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->paramRepository->findParamById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Param models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->paramSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->paramSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
