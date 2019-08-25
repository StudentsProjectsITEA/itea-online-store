<?php

namespace frontend\controllers;

use common\components\ProductParamsFinder;
use common\components\ProductViewer;
use common\repositories\BrandRepository;
use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use common\models\ProductSearch;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main-layout';
        $this->productRepository = Yii::$container->get(ProductRepository::class);
        $this->categoryRepository = Yii::$container->get(CategoryRepository::class);
        $this->brandRepository = Yii::$container->get(BrandRepository::class);
        $this->productViewer = Yii::$container->get(ProductViewer::class);
        $this->productSearchModel = Yii::$container->get(ProductSearch::class);
        parent::__construct($id, $module, $config);
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
