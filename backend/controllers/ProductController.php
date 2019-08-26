<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\ProductRepository;
use common\models\Product;
use common\models\ProductSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    /* @var ProductRepository $productRepository */
    private $productRepository;
    /* @var ProductSearch $productSearch */
    private $productSearch;

    /**
     * ParamController constructor.
     * {@inheritdoc}
     * @param ProductSearch $productSearch
     * @param ProductRepository $productRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        ProductSearch $productSearch,
        ProductRepository $productRepository,
        $config = []
    )
    {
        $this->productRepository = $productRepository;
        $this->productSearch = $productSearch;
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->productSearch->search(20, Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->productRepository->findProductById($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->productRepository->findProductById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->productRepository->findProductById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->productSearch->search(20, Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->productSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
