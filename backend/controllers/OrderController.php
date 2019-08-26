<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\OrderRepository;
use common\models\Order;
use backend\models\OrderSearch;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends BaseController
{
    /* @var OrderRepository $orderRepository */
    private $orderRepository;
    /* @var OrderSearch $orderSearch */
    private $orderSearch;

    /**
     * OrderController constructor.
     * {@inheritdoc}
     * @param OrderSearch $orderSearch
     * @param OrderRepository $orderRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        OrderSearch $orderSearch,
        OrderRepository $orderRepository,
        $config = []
    )
    {
        $this->orderRepository = $orderRepository;
        $this->orderSearch = $orderSearch;
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->orderSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->orderRepository->findOrderById($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->orderRepository->findOrderById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->orderRepository->findOrderById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->orderSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->orderSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
