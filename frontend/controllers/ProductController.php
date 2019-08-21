<?php

namespace frontend\controllers;

use common\components\ProductParamsFinder;
use common\components\ProductViewer;
use common\repositories\BrandRepository;
use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use Exception;
use Ramsey\Uuid\Uuid;
use Throwable;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\StaleObjectException;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var BrandRepository
     */
    private $brandRepository;
    /**
     * @var ProductViewer
     */
    private $productViewer;
    /**
     * @var ProductSearch
     */
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
        return $this->render('index', [
            'allCategories' => $this->categoryRepository->getMainCategories(),
            'allBrands' => $this->brandRepository->findBrands(),
            'dataProvider' => $this->productSearchModel->search(5, Yii::$app->request->queryParams),
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
            'productId' => Uuid::uuid4()->toString(),
            'productMainPhoto' => 'main_photo.jpg',
            'createdTime' => time(),
            'updatedTime' => time(),
            'categoryId' => Uuid::uuid4()->toString(),
            'brandId' => Uuid::uuid4()->toString(),
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
}
