<?php

namespace backend\controllers;

use backend\repositories\AdminRepository;
use common\repositories\PhotoRepository;
use common\models\Photo;
use common\models\PhotoSearch;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Throwable;
use Yii;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends BaseController
{
    /* @var PhotoRepository $photoRepository */
    private $photoRepository;
    /* @var PhotoSearch $photoSearch */
    private $photoSearch;

    /**
     * ParamController constructor.
     * {@inheritdoc}
     * @param PhotoSearch $photoSearch
     * @param PhotoRepository $photoRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        PhotoSearch $photoSearch,
        PhotoRepository $photoRepository,
        $config = []
    )
    {
        $this->photoRepository = $photoRepository;
        $this->photoSearch = $photoSearch;
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
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->photoSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->photoRepository->findPhotoById($id),
        ]);
    }

    /**
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Photo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->photoRepository->findPhotoById($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Photo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->photoRepository->findPhotoById($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Photo models.
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = $this->photoSearch->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $this->photoSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
}
