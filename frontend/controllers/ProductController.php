<?php

namespace frontend\controllers;

use common\components\ProductParamsFinder;
use common\components\ProductViewer;
use common\repositories\BrandRepository;
use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use common\models\ProductSearch;
use frontend\repositories\UserRepository;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    /** @var ProductRepository */
    private $productRepository;
    /** @var CategoryRepository */
    private $categoryRepository;
    /** @var BrandRepository */
    private $brandRepository;
    /** @var ProductViewer */
    private $productViewer;
    /** @var ProductSearch */
    private $productSearchModel;

    /**
     * SiteController constructor.
     * {@inheritdoc}
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param BrandRepository $brandRepository
     * @param ProductViewer $productViewer
     * @param ProductSearch $productSearch
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        UserRepository $userRepository,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
        ProductViewer $productViewer,
        ProductSearch $productSearch,
        $config = []
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->productViewer = $productViewer;
        $this->productSearchModel = $productSearch;
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
                            'view',
                        ],
                        'allow' => true,
                        'roles' => ['?'],
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
        $count = Yii::$app->params['countOfProductsOnProductsPage'];

        return $this->render('index', [
            'allCategories' => $this->categoryRepository->getMainCategories(),
            'allBrands' => $this->brandRepository->findBrands(),
            'dataProvider' => $this->productSearchModel->search($count, Yii::$app->request->queryParams),
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
        $model = $this->productRepository->findProductById($id);
        $productParams = new ProductParamsFinder();
        $productParams->recordProductParams($this->productRepository->findAllProductParamValuesById($model->id));

        return $this->render('view', [
            'model' => $model,
            'parentCategory' => $this->productRepository->findProductParentCategoryName($model->category->parent_id),
            'params' => $productParams->getParams(),
            'colorValues' => $productParams->getColorValues(),
            'sizeValues' => $productParams->getSizeValues(),
        ]);
    }
}
