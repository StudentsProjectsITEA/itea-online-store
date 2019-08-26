<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\BrandRepository;
use common\models\Brand;
use backend\models\BrandSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends BaseController
{
    /* @var BrandRepository $brandRepository */
    private $brandRepository;
    /* @var BrandSearch $brandSearch */
    private $brandSearch;


    /**
     * BrandController constructor.
     * {@inheritdoc}
     * @param BrandSearch $brandSearch
     * @param BrandRepository $brandRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        BrandSearch $brandSearch,
        BrandRepository $brandRepository,
        $config = []
    )
    {
        $this->brandRepository = $brandRepository;
        $this->brandSearch = $brandSearch;
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
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->brandSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brand model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->brandRepository->findBrandById($id),
        ]);
    }

    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Brand();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->brandRepository->findBrandById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->brandRepository->findBrandById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Brand models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->brandSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->brandSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
