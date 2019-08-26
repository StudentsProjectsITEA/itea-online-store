<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\CategoryRepository;
use common\models\Category;
use common\models\CategorySearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{
    /* @var CategoryRepository $categoryRepository */
    private $categoryRepository;
    /* @var CategorySearch $categorySearch */
    private $categorySearch;

    /**
     * CategoryController constructor.
     * {@inheritdoc}
     * @param CategorySearch $categorySearch
     * @param CategoryRepository $categoryRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        CategorySearch $categorySearch,
        CategoryRepository $categoryRepository,
        $config = []
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->categorySearch = $categorySearch;
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->categorySearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->categoryRepository->findCategoryById($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->categoryRepository->findCategoryById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->categoryRepository->findCategoryById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->categorySearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->categorySearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
